<?php

namespace PageWeb\Repository;

use Illuminate\Support\Collection;
use PageWeb\Model\Theme;

class ThemeRepository
{
    /**
     * @var \PageWeb\Model\Theme
     */
    protected $model;

    public function __construct(Theme $theme)
    {
        $this->model = $theme;
    }

    /**
     * @return Collection
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Finds a theme by its id
     *
     * @param $id
     * @return Theme
     */
    public function findById($id)
    {
        return $this->model->newQuery()->where('id', $id)->first();
    }

    /**
     * @param array $fields
     * @return Theme|null
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
     * @param $name
     * @return Theme
     */
    public function findByName($name)
    {
        if ($theme = $this->model->newQuery()->where('name', $name)) {
            return $theme->first();
        }

        return null;
    }

    /**
     * @param       $perPage
     * @param int $categoryId
     * @param array $columns
     * @return \Illuminate\Pagination\Paginator
     */
    public function paginate($perPage, $categoryId = null, $columns = ['*'])
    {
        $model = $this->model;

        if (!empty($categoryId)) {
            $model->where('category_id', '=', $categoryId);
        }

        return $model->paginate($perPage, $columns);
    }

    /**
     * Updates a theme
     *
     * @param $id
     * @param array $data
     * @return bool|\PageWeb\Model\Theme
     */
    public function update($id, array $data)
    {
        if ($theme = $this->findById($id)) {
            if ($theme->update($data)) {
                return $theme;
            }
        }

        return false;
    }

    /**
     * Creates a theme
     *
     * @param array $val
     * @param int $id
     * @return \PageWeb\Model\Theme
     */
    public function save($val, $id = null)
    {
        $val = array_merge([
            'name' => '',
            'title' => '',
            'description' => '',
            'category_id' => ''
        ], $val);

        /**
         * @var $name
         * @var $title
         * @var $category_id
         * @var $description
         */
        extract($val);

        if (!$id and $this->findBy(['name' => $name, 'category_id' => $category_id])) {
            return false;
        }

        $theme = (!$id) ? $this->model->newInstance() : $this->findBy(['id' => $id]);
        $theme->name = $name;
        $theme->title = $title;
        $theme->description = $description;
        $theme->category_id = $category_id;
        $theme->save();

        \Event::fire('theme.create', array($theme->getId(), $val));

        return $theme;
    }
}
