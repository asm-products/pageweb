<?php

namespace PageWeb\Repository;

use PageWeb\Model\SiteEvent;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class SiteEventRepository
{
    protected $model;

    public function __construct(SiteEvent $model)
    {
        $this->model = $model;
    }

    /**
     * @param $id
     * @return SiteEvent
     */
    public function findById($id)
    {
        return $this->model->find($id);
    }

    /**
     * @param array $data
     * @return SiteEvent
     */
    public function create(array $data)
    {
        $event = $this->model->newInstance();
        $event->fill($data);
        $event->save();

        return $event;
    }
}
