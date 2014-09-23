<?php

namespace PageWeb\Form\Theme;

use PageWeb\Repository\ThemeCategoryRepository;
use PageWeb\Support\Exception\ValidationException;
use Prologue\Alerts\AlertsMessageBag;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class ThemeCategoryForm
{
    public function __construct(
        ThemeCategoryRepository $themeCategoryRepo,
        ThemeCategoryFormValidator $validator,
        AlertsMessageBag $alerts
    ) {
        $this->themeCategoryRepo = $themeCategoryRepo;
        $this->validator = $validator;
        $this->alerts = $alerts;
    }

    /**
     * Creates a new theme category
     *
     * @param array $data Available options
     * <p>
     *  name: The category name
     * </p>
     * @return bool|null
     */
    public function create(array $data)
    {
        $category = null;
        try {
            if (!$this->validator->with($data)->passes()) {
                throw new ValidationException($this->validator->errors());
            }

            $category = $this->themeCategoryRepo->save($data['name']);
        } catch (ValidationException $e) {
            $this->alerts->error($e->getMessage());
        }

        return $category;
    }

    /**
     * Gets all errors
     *
     * @return array
     */
    public function errors()
    {
        return $this->alerts->get('error');
    }
}
