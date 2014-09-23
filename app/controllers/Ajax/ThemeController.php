<?php

namespace App\Controller\Ajax;

use Illuminate\Routing\Controller;
use PageWeb\Repository\ThemeCategoryRepository;
use PageWeb\Repository\ThemeRepository;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class ThemeController extends Controller
{
    public function __construct(ThemeRepository $themeRepo, ThemeCategoryRepository $themeCategoryRepo)
    {
        $this->themeRepo = $themeRepo;
        $this->themeCategoryRepo = $themeCategoryRepo;
    }

    public function all()
    {
        return \Response::json($this->themeRepo->all());
    }

    public function categories()
    {
        return \Response::json($this->themeCategoryRepo->all());
    }
}
