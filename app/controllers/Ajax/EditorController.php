<?php

namespace App\Controller\Ajax;

use Controller;
use PageWeb\Repository\SiteRepository;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class EditorController extends Controller
{
    public function __construct(SiteRepository $siteRepo)
    {
        $this->siteRepo = $siteRepo;
    }
}
