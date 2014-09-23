<?php

namespace PageWeb\Repository;

use PageWeb\Model\SiteAlbum;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class SiteAlbumRepository
{
    protected $model;

    public function __construct(SiteAlbum $album)
    {
        $this->model = $album;
    }

    /**
     * @param array $data
     * @return SiteAlbum
     */
    public function create(array $data)
    {
        $album = $this->model->newInstance();
        $album->fill($data);
        $album->save();

        return $album;
    }
}
