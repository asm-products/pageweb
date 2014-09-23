<?php

namespace App\Controller\SiteFrontend;

use Cartalyst\Sentry\Sentry;
use Illuminate\Foundation\Application;
use Input;
use PageWeb\Repository\SiteRepository;
use PageWeb\Repository\ThemeRepository;
use PageWeb\Site\ApiDataSource;
use PageWeb\Site\SiteProvider;
use PageWeb\Support\Facebook\GraphClientInterface;
use Teepluss\Theme\Theme;
use View;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class PreviewController extends BaseSiteController
{
    public function __construct(
        Sentry $sentry,
        Application $app,
        GraphClientInterface $client,
        Theme $theme,
        ThemeRepository $themeRepo,
        SiteRepository $siteRepo,
        SiteProvider $siteProvider
    ) {
        $this->app = $app;
        $this->client = $client;
        $this->themeRepo = $themeRepo;
        $this->siteRepo = $siteRepo;
        $this->sentry = $sentry;
        $this->theme = $theme->uses('default')->layout('default');
        $this->siteProvider = $siteProvider;

        $app->missing(function () {
            // For site that do not exists
            return View::make('site.invalid');
        });
    }

    protected function setupSite($id)
    {
        $this->siteProvider->setId($id);
        $this->siteProvider->setEditMode(true);
        if (!$this->siteProvider->isPublished()) {
            $this->app->abort(404);
        }

        if (!$this->siteProvider->isValid()) {
            // The site data source could not be validated. Abort!!
            $this->app->abort(404);
        }

        $source = $this->siteProvider->getDataSource();
        if ($source instanceof ApiDataSource) {
            if (Input::query('theme') && ($theme = $this->themeRepo->findByName(Input::query('theme')))) {
                $source->setTheme($theme);
            }
        }

        if (!empty($this->siteProvider->theme()->name)) {
            // If the site has a theme set
            $this->theme->uses($this->siteProvider->theme()->name);
        }

        $this->theme->set('site', $this->siteProvider);
    }
}
