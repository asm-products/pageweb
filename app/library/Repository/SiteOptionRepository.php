<?php

namespace PageWeb\Repository;

use PageWeb\Model\SiteOption;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class SiteOptionRepository
{
    /**
     * @var \PageWeb\Model\SiteOption
     */
    protected $model;

    public function __construct(SiteOption $theme)
    {
        $this->model = $theme;
    }

    /**
     * @param array $fields
     * @return SiteOption|null
     */
    public function findBy(array $fields)
    {
        $theme = $this->model->newQuery();

        foreach ($fields as $field => $value) {
            $theme->where($field, $value);
        }

        if ($theme) {
            return $theme->first();
        }

        return null;
    }

    /**
     * Creates a theme option
     *
     * @param array $data
     * @return \PageWeb\Model\SiteOption
     */
    public function save($data)
    {
        $option = $this->model->newInstance();
        $option->fill($data);
        $option->save();

        return $option;
    }
}
