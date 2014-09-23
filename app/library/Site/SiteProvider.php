<?php

namespace PageWeb\Site;

use Illuminate\Support\Collection;
use Symfony\Component\Process\Exception\RuntimeException;
use URL;

/**
 * @property-read \PageWeb\Model\Site $site
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class SiteProvider
{
    protected $sourceManager;

    protected $source;

    protected $id;

    protected $editMode = false;

    public function __construct(SourceManager $sourceManager)
    {
        $this->sourceManager = $sourceManager->detect();
        $this->source = $this->sourceManager->source();
    }

    public function setId($id)
    {
        $this->source->setId($this->id = $id);
    }

    /**
     * Gets site id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Checks if this site source data is valid
     *
     * @return mixed
     */
    public function isValid()
    {
        return $this->source->isValid();
    }

    /**
     * @return DataSourceInterface
     */
    public function getDataSource()
    {
        return $this->source;
    }

    public function isDataSource($sourceName)
    {
        $source = $this->source;

        /** @noinspection PhpUndefinedFieldInspection */

        return $source::NAME == $sourceName;
    }

    /**
     * Specify if a site is in edit mode
     *
     * @param $flag
     */
    public function setEditMode($flag)
    {
        $this->editMode = $flag;
    }

    /**
     * @return bool
     */
    public function inEditMode()
    {
        return $this->editMode;
    }

    /**
     * @return bool
     */
    public function inPreviewMode()
    {
        return $this->source instanceof ApiDataSource;
    }

    /**
     * Gets site title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->site->title;
    }

    /**
     * Gets site name
     *
     * @return string
     */
    public function getName()
    {
        return $this->site->name;
    }

    /**
     * Checks if a site is published
     *
     * @return bool
     */
    public function isPublished()
    {
        if ($this->inEditMode()) {
            return true;
        }

        return $this->site->isPublished();
    }

    /**
     * @param string $var
     * @param null|mixed $default Default
     * @param bool $editableOnEditMode
     * @return mixed|null
     */
    public function option($var, $default = null, $editableOnEditMode = true)
    {
        $options = $this->theme()->config()['options'];
        if (!isset($options[$var])) {
            // If this option has not been defined in the
            // config file, return the default value
            return $default;
        }

        $value = $this->site->getOption($var, $default);

        return $this->inEditMode() && $editableOnEditMode
            ? $this->prepareOptionEditHtml($var, $value, $options)
            : $value;
    }

    /**
     * @return \PageWeb\Model\Theme
     */
    public function theme()
    {
        return $this->source->theme();
    }

    /**
     * Site photo albums
     *
     * @return \Illuminate\Support\Collection
     */
    public function albums()
    {
        return $this->source->albums();
    }

    /**
     * Site photos
     *
     * @param array $options
     * @return \Illuminate\Support\Collection
     */
    public function photos(array $options = [])
    {
        return $this->source->photos($options);
    }

    /**
     * Site posts
     *
     * @param array $options
     * @return \Illuminate\Support\Collection
     */
    public function posts(array $options = [])
    {
        return $this->source->posts($options);
    }

    /**
     * Single post
     *
     * @param $postId
     * @return mixed
     */
    public function post($postId)
    {
        return $this->source->post($postId);
    }

    /**
     * Site feeds
     *
     * @param array $options
     * @return \Illuminate\Support\Collection
     */
    public function feeds(array $options = [])
    {
        return $this->source->feeds($options);
    }

    /**
     * Site cover photos
     *
     * @param int $limit
     * @return \Illuminate\Support\Collection
     */
    public function coverPhotos($limit = 5)
    {
        return $this->source->coverPhotos($limit);
    }

    /**
     * Site events
     *
     * @return \Illuminate\Support\Collection
     */
    public function events()
    {
        return new Collection();
    }

    /**
     * Generates a url to a site page
     *
     * @param string $page
     * @param array $params
     * @return string
     */
    public function urlRoute($page, array $params = array())
    {
        $url = null;
        $query = http_build_query(\Request::query());

        if ($this->inEditMode()) {
            $routeNamePrefix = 'editor.preview.';
            $routeParam = ['site_id' => $this->getId()];
        } else {
            $routeNamePrefix = 'site.';
            $routeParam = [];
            if (is_main_site()) {
                $routeParam = ['name' => $this->getName()];
            }
        }

        try {
            // Try to generate the url
            $url = URL::route($routeNamePrefix . $page, array_merge($routeParam, $params));
        } catch (\InvalidArgumentException $e) {
            // If the url is not found, instead of throwing an error, link back to homepage
            $url = URL::route($routeNamePrefix . 'home', $routeParam);
        }

        if ($query) {
            $url .= '?' . $query;
        }

        return $url;
    }

    public function menus(array $options = array())
    {
        $options = array_merge([
            'only' => [],
            'except' => [],
            'pages' => true
        ], $options);

        $menus = [];
        foreach (['home', 'about', 'gallery', 'events', 'news'] as $index => $menu) {
            if ($options['only'] && !in_array($menu, $options['only'])) {
                continue;
            }

            if ($options['except'] && in_array($menu, $options['except'])) {
                continue;
            }

            $menus[$index] = (object) [
                'title' => trans('site.menu.' . $menu),
                'url' => $this->urlRoute($menu),
            ];
        }

        return $menus;
    }

    /**
     * Generates a url To a path in the site theme
     *
     * @param $uri
     * @param array $params
     * @return string
     */
    public function urlTo($uri, array $params = array())
    {
        return URL::to('themes/' . $this->theme()->name . '/' . $uri);
    }

    /**
     * @return string
     */
    public function header()
    {
        $output = null;
        if ($this->editMode) {
            $styles = [
                URL::to('asset/css/bootstrap-editable.css')
            ];
            $scripts = [
                URL::to('asset/js/jquery-1.11.0.min.js'),
                URL::to('asset/js/bootstrap.min.js'),
                URL::to('asset/js/bootstrap-editable.js')
            ];
            foreach ($styles as $style) {
                $output .= '<link rel="stylesheet" href="' . $style . '"/>' . "\r\n";
            }

            foreach ($scripts as $script) {
                $output .= '<script type="text/javascript" src="' . $script . '"></script>' . "\r\n";
            }

            $output .= '
                <script type="text/javascript">
                    $(function(){
                        $(".editable").editable();
                    });
                </script>' . "\r\n";
        }

        return $output;
    }

    private function prepareOptionEditHtml($var, $value, $options)
    {
        $url = substr(URL::route('xhr.sites.theme.options:post', [
            'site_id' => $this->getId()
        ]), strlen(URL::to('/')));

        return sprintf(
            '<a
                data-type="%s"
                data-url="%s"
                data-pk="1"
                data-params="{_x_editable_ : true}"
                id="option-%s"
                class="editable editable-click"
                href="#">
                %s
            </a>',
            $options[$var]['type'],
            $url,
            $var,
            $value
        );
    }

    public function __get($property)
    {
        if ($property == 'site') {
            return $this->source->site();
        }

        $site = $this->source->site();
        if (property_exists($site, $property)) {
            return $site->{$property};
        }

        throw new RuntimeException('Call to undefined property: ' . __CLASS__ . '->' . $property);
    }

    public function __call($method, $args)
    {
        if (method_exists($this->site, $method)) {
            return call_user_func_array(array($this->site, $method), $args);
        }

        throw new RuntimeException('Call to undefined method: ' . __CLASS__ . '::' . $method . '()');
    }
}
