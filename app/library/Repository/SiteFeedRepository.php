<?php

namespace PageWeb\Repository;

use PageWeb\Model\SiteFeed;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class SiteFeedRepository
{
    protected $model;

    public function __construct(SiteFeed $feed)
    {
        $this->model = $feed;
    }

    /**
     * @param int $id
     * @return SiteFeed
     */
    public function findById($id)
    {
        return $this->model->find($id);
    }

    /**
     * @param array $data
     * @return SiteFeed
     */
    public function create(array $data)
    {
        $feed = $this->model->newInstance();
        $feed->fill($data);
        $feed->save();

        return $feed;
    }
}
