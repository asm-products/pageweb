<?php

namespace PageWeb\Repository;

use Illuminate\Events\Dispatcher;
use PageWeb\Event\ThemeActions;
use PageWeb\Model\ThemeCategory;

class ThemeCategoryRepository
{
    /**
     * Model
     */
    protected $model;

    /**
     * Constructor
     */
    public function __construct(
        ThemeCategory $themeCategory,
        Dispatcher $dispatcher
    ) {
        $this->model = $themeCategory;
        $this->dispatcher = $dispatcher;
    }

    /**
     * Gets all categories
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Save theme category
     *
     * @param array $data
     * @return boolean
     */
    public function save(array $data)
    {
        $category = $this->model->newInstance();
        $category->fill($data);
        $category->save();

        $this->dispatcher->fire(ThemeActions::CREATE_CATEGORY, [$this->model, $data]);

        return $category;
    }

    /**
     * Get List
     *
     * @param int $limit
     * @return array
     */
    public function getList($limit = 10)
    {
        return $this->model->orderBy('created_at', 'desc')->paginate($limit);
    }

    /**
     * Themes
     *
     * @param int $categoryId
     * @param int $limit
     * @param array $column
     * @return \PageWeb\Model\ThemeCategory
     */
    public function themes($categoryId, $limit = 10, $column = ['*'])
    {
        return $this->model->find($categoryId)->themes()->paginate($limit, $column);
    }
}
