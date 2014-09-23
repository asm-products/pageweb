<?php

namespace PageWeb\Repository;

use Illuminate\Support\Collection;
use PageWeb\Model\SiteDomain;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class SiteDomainRepository
{
    public function __construct(SiteDomain $model)
    {
        $this->model = $model;
    }

    /**
     * @param $domain
     * @return SiteDomain
     */
    public function findByDomain($domain)
    {
        return $this->model->newQuery()->where('domain', $domain)->first();
    }

    /**
     * @param array $domains
     * @return Collection
     */
    public function findByDomains(array $domains)
    {
        return $this->model->newQuery()->whereIn('domain', $domains)->get();
    }
}
