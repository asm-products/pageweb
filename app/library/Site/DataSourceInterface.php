<?php

namespace PageWeb\Site;

use Illuminate\Support\Collection;
use PageWeb\Model\Theme;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
interface DataSourceInterface
{
    public function setId($id);

    public function getId();

    public function isValid();

    /**
     * Gets site details
     *
     * @return mixed
     */
    public function site();

    /**
     * Gets page albums
     *
     * @return Collection
     */
    public function albums();

    /**
     * Gets page photos
     *
     * @param array $options
     * @return Collection
     */
    public function photos(array $options = []);

    /**
     * Gets page cover photos
     *
     * @param int $limit
     * @return Collection
     */
    public function coverPhotos($limit);

    /**
     * Gets page posts
     *
     * @param array $options
     * @return Collection
     */
    public function posts(array $options = []);

    /**
     * Gets a single post
     *
     * @param int $id
     * @return mixed
     */
    public function post($id);

    /**
     * Gets page feeds
     *
     * @param array $options
     * @return Collection
     */
    public function feeds(array $options = []);

    /**
     * Gets page events
     *
     * @param array $options
     * @return Collection
     */
    public function events(array $options = []);

    /**
     * @return Theme
     */
    public function theme();
}
