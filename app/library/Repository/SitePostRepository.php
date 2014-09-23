<?php

namespace PageWeb\Repository;

use PageWeb\Model\SitePost;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class SitePostRepository
{
    protected $model;

    public function __construct(SitePost $post)
    {
        $this->model = $post;
    }

    /**
     * @param array $data
     * @return SitePost
     */
    public function create(array $data)
    {
        $post = $this->model->newInstance();
        $post->fill($data);
        $post->save();

        return $post;
    }
}
