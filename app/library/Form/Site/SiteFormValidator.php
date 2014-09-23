<?php

namespace PageWeb\Form\Site;

use PageWeb\Support\Validation\BaseInputValidation;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class SiteFormValidator extends BaseInputValidation
{
    public function rules()
    {
        return [];
    }

    /**
     * @return SiteFormValidator
     */
    public function usingDomainRules()
    {
        $this->rules = [
            'site_id' => ['required'],
            'domain' => ['required', 'unique:sites_domains,domain']
        ];

        return $this;
    }
}
 