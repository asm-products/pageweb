<?php

namespace PageWeb\Site;

use PageWeb\Repository\SiteRepository;

/**
 * Data source that pulls its content directly from
 * facebook graph api
 *
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class DatabaseDataSource implements DataSourceInterface
{
    const NAME = 'database';

    protected $id;

    protected $siteRepo;

    /**
     * @var \PageWeb\Model\Site
     */
    protected $site;

    public function __construct(SiteRepository $siteRepo)
    {
        $this->siteRepo = $siteRepo;
    }

    public function setId($id)
    {
        $this->site = $this->siteRepo->findById($this->id = $id);
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
        return $this->site != null;
    }

    /**
     * {@inheritDoc}
     */
    public function site()
    {
        return $this->site;
    }

    /**
     * {@inheritDoc}
     */
    public function albums()
    {
        return $this->site->albums;
    }

    /**
     * {@inheritDoc}
     */
    public function photos(array $options = [])
    {
        /**
         * @var int $album_id
         * @var string $type
         */
        extract(array_merge(['album_id' => null, 'type' => null], $options));
        $photos = $this->site->photos();

        if ($album_id) {
            $photos->where('album_id', $album_id);
        }

        if ($type) {
            $photos->where('type', $type);
        }

        if ($photos) {
            return $photos->get();
        }

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
        extract(array_merge(['paginate' => null], $options));
        $posts = $this->site->posts();

        if ($paginate && is_int($paginate)) {
            $posts = $posts->paginate($paginate);
        } else {
            $posts = $posts->get();
        }

        return $posts;
    }

    /**
     * {@inheritDoc}
     */
    public function post($id)
    {
        return $this->site->posts()->where('id', $id)->first();
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
        extract(array_merge(['paginate' => null, 'types' => null], $options));
        $posts = $this->site->feeds();

        if ($types) {
            $types = (array) $types;
            foreach ($types as $type) {
                $posts->where('type', $type);
            }
        }

        if ($paginate && is_int($paginate)) {
            $posts = $posts->paginate($paginate);
        } else {
            $posts = $posts->get();
        }

        return $posts;
    }

    /**
     * {@inheritDoc}
     */
    public function events(array $options = [])
    {
        return $this->site->posts;
    }

    /**
     * {@inheritDoc}
     */
    public function theme()
    {
        return $this->site->theme;
    }

    /**
     * {@inheritDoc}
     */
    public function coverPhotos($limit)
    {
        return $this->photos(['type' => 'cover'])->take($limit);
    }
}
