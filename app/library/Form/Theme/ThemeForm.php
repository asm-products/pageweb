<?php

namespace PageWeb\Form\Theme;

use PageWeb\Model\Theme;
use PageWeb\Repository\ThemeRepository;
use PageWeb\Support\Exception\ValidationException;
use Prologue\Alerts\AlertsMessageBag;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class ThemeForm
{
    public function __construct(
        ThemeRepository $themeRepo,
        ThemeFormValidator $validator,
        AlertsMessageBag $alerts
    ) {
        $this->themeRepo = $themeRepo;
        $this->validator = $validator;
        $this->alerts = $alerts;
    }

    /**
     * Creates a new theme
     *
     * @param array $data
     * @return null|Theme
     */
    public function create(array $data)
    {
        $theme = null;
        try {
            if (!$this->validator->with($data)->passes()) {
                throw new ValidationException($this->validator->errors());
            }

            $theme = $this->themeRepo->save($data);
        } catch (ValidationException $e) {
            $this->alerts->merge($e->errors());
        }

        return $theme;
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
        $theme = null;
        try {
            if (!$this->validator->updateRules()->with($data)->passes()) {
                throw new ValidationException($this->validator->errors());
            }

            $theme = $this->themeRepo->update($id, $data);
        } catch (ValidationException $e) {
            $this->alerts->merge($e->errors());
        }

        return $theme;
    }

    public function errors()
    {
        return $this->alerts->get('error');
    }
}
