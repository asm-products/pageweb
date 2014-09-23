<?php

namespace PageWeb\Site;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use PageWeb\Model\Site;
use PageWeb\Model\SiteAlbum;
use PageWeb\Model\SiteEvent;
use PageWeb\Model\SiteFeed;
use PageWeb\Model\SitePhoto;
use PageWeb\Model\SitePost;
use PageWeb\Model\Theme;
use PageWeb\Support\Facebook\GraphClientInterface;

/**
 * Data source that pulls its content directly from
 * facebook graph api
 *
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class ApiDataSource implements DataSourceInterface
{
    const NAME = 'api';

    protected $id;

    /**
     * @var Theme
     */
    protected $theme;

    public function __construct(GraphClientInterface $client)
    {
        $this->client = $client;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritDoc}
     */
    public function isValid()
    {
        return isset($this->site()->id);
    }

    /**
     * {@inheritDoc}
     */
    public function site()
    {
        $page = new Site($this->client->getPage($this->id));
        $page->is_published = 0;

        return $page;
    }

    /**
     * {@inheritDoc}
     */
    public function albums()
    {
        $albums = new Collection($this->client->getPageAlbums($this->id, null, [
            'connection_photos' => true
        ]));

        $albums->transform(function ($item) {
            $album = new SiteAlbum($item);
            $album->photos = new Collection($item['photos']);
            $album->photos->transform(function ($item) {
                return new SitePhoto([
                    'page_id' => $this->id,
                    'url' => $item['picture'],
                    'caption' => $item['caption'],
                    'created_at' => Carbon::parse($item['created_at'])
                ]);
            });

            return $album;
        });

        return $albums;
    }

    /**
     * {@inheritDoc}
     */
    public function photos(array $options = [])
    {
        $photos = new Collection($this->client->getPagePhotos($this->id));
        $photos->transform(function ($item) {
            return new SitePhoto($item);
        });

        return $photos;
    }

    public function coverPhotos($limit)
    {
        $photos = new Collection($this->client->getPageCoverPhotos($this->id));
        $photos->transform(function ($item) {
            return new SitePhoto($item);
        });

        return $photos;
    }

    /**
     * {@inheritDoc}
     */
    public function posts(array $options = [])
    {
        /**
         * @var int $paginate
         */
        extract($options);

        $posts = new Collection($this->client->getPageNotes($this->id));
        $posts->transform(function ($item) {
            return new SitePost([
                'id' => $item['id'],
                'page_id' => $this->id,
                'title' => $item['title'],
                'content' => $item['content'],
                'created_at' => Carbon::parse($item['created_at']),
                'updated_at' => Carbon::parse($item['updated_at'])
            ]);
        });

        return $posts;
    }

    /**
     * {@inheritDoc}
     */
    public function post($id)
    {
        return new SitePost([]);
    }

    /**
     * {@inheritDoc}
     */
    public function feeds(array $options = [])
    {
        /**
         * @var int $paginate
         * @var string|array $types
         */
        extract($options);

        $posts = new Collection($this->client->getPagePosts($this->id));
        $posts->transform(function ($item) {
            return new SiteFeed($item);
        });

        return $posts;
    }

    public function events(array $options = [])
    {
        $events = new Collection($this->client->getPageEvents($this->id));
        $events->transform(function ($item) {
            return new SiteEvent($item);
        });

        return $events;
    }

    public function theme()
    {
        return $this->theme;
    }

    public function setTheme(Theme $theme)
    {
        $this->theme = $theme;
    }
}
 