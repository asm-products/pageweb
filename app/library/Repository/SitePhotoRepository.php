<?php

namespace PageWeb\Repository;

use PageWeb\Model\SitePhoto;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class SitePhotoRepository
{
    protected $model;

    public function __construct(SitePhoto $photo)
    {
        $this->model = $photo;
    }

    /**
     * @param array $data
     * @return SitePhoto
     */
    public function create(array $data)
    {
        $photo = $this->model->newInstance();
        $photo->fill($data);
        $photo->save();

        return $photo;
    }
}
