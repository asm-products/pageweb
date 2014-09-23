<?php

namespace PageWeb\Form\Theme;

use PageWeb\Support\Validation\BaseInputValidation;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class ThemeFormValidator extends BaseInputValidation
{
    public function rules()
    {
        return [
            'name' => 'required',
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required'
        ];
    }

    /**
     * @return ThemeFormValidator
     */
    public function updateRules()
    {
        $this->rules = [
            'name' => ['sometimes', 'required'],
            'title' => ['sometimes', 'required'],
            'description' => ['sometimes', 'required'],
            'category_id' => ['sometimes', 'required']
        ];

        return $this;
    }
}
