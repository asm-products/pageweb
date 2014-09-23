<?php

namespace PageWeb\Form\Theme;

use PageWeb\Support\Validation\BaseInputValidation;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class ThemeCategoryFormValidator extends BaseInputValidation
{
    public function rules()
    {
        return [
            'name' => ['required']
        ];
    }
}
