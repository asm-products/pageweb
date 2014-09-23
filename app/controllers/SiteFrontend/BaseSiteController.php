<?php

namespace App\Controller\SiteFrontend;

use BaseController;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
abstract class BaseSiteController extends BaseController
{
    /**
     * @var \PageWeb\Site\SiteProvider
     */
    protected $siteProvider;

    /**
     * @var \Teepluss\Theme\Theme
     */
    protected $theme;

    public function index($id)
    {
        $this->setupSite($id);

        return $this->theme->scope('index', [
            'site' => $this->siteProvider
        ])->render();
    }

    public function about($id)
    {
        $this->setupSite($id);

        return $this->theme->scope('about', [
            'site' => $this->siteProvider
        ])->render();
    }

    public function contact($id)
    {
        $this->setupSite($id);

        return $this->theme->scope('contact', [
            'site' => $this->siteProvider
        ])->render();
    }

    public function gallery($id)
    {
        $this->setupSite($id);

        return $this->theme->scope('gallery', [
            'site' => $this->siteProvider,
            'albums' => $this->siteProvider->albums()
        ])->render();
    }

    public function posts($id)
    {
        $this->setupSite($id);

        return $this->theme->scope('posts', [
            'site' => $this->siteProvider,
            'posts' => $this->siteProvider->posts(['paginate' => 10])
        ])->render();
    }

    public function post($id, $postId)
    {
        $this->setupSite($id);

        return $this->theme->scope('post', [
            'site' => $this->siteProvider,
            'post' => $this->siteProvider->post($postId)
        ])->render();
    }

    public function photos($id, $albumId)
    {
        $this->setupSite($id);

        return $this->theme->scope('photos', [
            'site' => $this->siteProvider,
            'photos' => $this->siteProvider->photos(['album_id' => $albumId])
        ])->render();
    }

    public function events($id)
    {
        $this->setupSite($id);

        return $this->theme->scope('events', [
            'site' => $this->siteProvider
        ])->render();
    }

    /**
     * Error 404
     *
     * @param string $id
     * @return mixed
     */
    public function error($id)
    {
        $this->setupSite($id);

        return $this->theme->scope('error', [
            'site' => $this->siteProvider
        ])->render();
    }

    /**
     * @param $id
     */
    abstract protected function setupSite($id);
}
