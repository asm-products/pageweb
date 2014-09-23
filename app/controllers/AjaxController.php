<?php

use Cartalyst\Sentry\Sentry;
use Illuminate\Http\JsonResponse;
use PageWeb\Repository\SiteRepository;
use PageWeb\Repository\ThemeRepository;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class AjaxController extends Controller
{
    public function __construct(Sentry $sentry, SiteRepository $siteRepo, ThemeRepository $themeRepo)
    {
        $this->sentry = $sentry;
        $this->siteRepo = $siteRepo;
        $this->themeRepo = $themeRepo;
    }

    /**
     * Change website theme
     *
     * @param $pageId
     * @return JsonResponse
     */
    public function editorTheme($pageId)
    {
        $theme = (string) e(Request::input('theme'));

        $result = ['errors' => true];
        if (($page = $this->siteRepo->findById($pageId))
            && ($theme = $this->themeRepo->findByName($theme))
        ) {
            $theme->sites()->save($page);
            $result = ['errors' => false];
        }

        return new JsonResponse($result);
    }
}
