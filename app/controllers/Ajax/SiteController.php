<?php

namespace App\Controller\Ajax;

use PageWeb\Form\Site\SiteForm;
use PageWeb\Repository\SiteRepository;
use PageWeb\Support\Exception\ValidationException;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class SiteController extends AjaxController
{
    public function __construct(SiteRepository $siteRepo, SiteForm $siteForm)
    {
        $this->siteRepo = $siteRepo;
        $this->siteForm = $siteForm;
    }

    /**
     * Gets all sites
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function all()
    {
        return \Response::json($this->siteRepo->all());
    }

    /**
     * @param int $siteId
     * @return \Illuminate\Http\JsonResponse
     */
    public function posts($siteId)
    {
        return \Response::json($this->siteRepo->findById($siteId)->posts);
    }

    /**
     * @param $siteId
     * @return \Illuminate\Http\JsonResponse
     */
    public function feeds($siteId)
    {
        return \Response::json($this->siteRepo->findById($siteId)->feeds);
    }

    /**
     * @param $siteId
     * @return \Illuminate\Http\JsonResponse
     */
    public function albums($siteId)
    {
        return \Response::json($this->siteRepo->findById($siteId)->albums);
    }

    /**
     * @param $siteId
     * @return \Illuminate\Http\JsonResponse
     */
    public function photos($siteId)
    {
        return \Response::json($this->siteRepo->findById($siteId)->photos);
    }

    /**
     * @param $siteId
     * @return \Illuminate\Http\JsonResponse
     */
    public function events($siteId)
    {
        return \Response::json($this->siteRepo->findById($siteId)->events);
    }

    /**
     * Updates a page
     *
     * @param $siteId
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($siteId)
    {
        $response = ['errors' => true];
        $data = array_filter(\Request::only(['name', 'email', 'phone', 'address', 'theme_id', 'is_published']));

        if ($this->siteRepo->update($siteId, $data)) {
            $response = ['errors' => false];
        }

        return \Response::json($response);
    }

    public function publish($siteId)
    {
        $response = [];
        if ($this->siteRepo->publish($siteId)) {
            $response['errors'] = false;
        }

        return $this->response($response);
    }

    public function updateSubdomain($siteId)
    {
        $subdomain = e(\Request::input('subdomain'));

        $response = [];
        try {
            if (($site = $this->siteRepo->findById($siteId))
                && $this->siteRepo->setSubDomain($site, $subdomain)
            ) {
                $response['errors'] = false;
            }
        } catch (ValidationException $e) {
            $response = ['errors' => true, 'error_message' => $e->getFirstError()];
        }

        return $this->response($response);
    }

    /**
     * @param $siteId
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateDomain($siteId)
    {
        $domain = e(\Request::input('domain'));

        if ($this->siteForm->updateDomain(['site_id' => $siteId, 'domain' => $domain])) {
            $response['errors'] = false;
        } else {
            $response['error_message'] = array_first_not_null($this->siteForm->errors());
        }

        return $this->response($response);
    }

    /**
     * Sets a page theme option
     */
    public function setOption($siteId)
    {
        $options = \Request::input();
        if (isset($options['_x_editable_'])) {
            $options = [substr($options['name'], 7) => $options['value']];
        }

        $response = ['errors' => true];
        if ($this->siteRepo->setOption($siteId, $options)) {
            $response = ['errors' => false];
        }

        return \Response::json($response);
    }
}
