<?php

namespace App\Controller\SiteFrontend;

use Cartalyst\Sentry\Sentry;
use Illuminate\Foundation\Application;
use PageWeb\Model\Site;
use PageWeb\Repository\SiteRepository;
use PageWeb\Site\SiteProvider;
use Teepluss\Theme\Theme;
use View;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class LiveController extends BaseSiteController
{
    public function __construct(
        Sentry $sentry,
        Application $app,
        Theme $theme,
        SiteRepository $siteRepo,
        SiteProvider $siteProvider
    ) {
        $this->app = $app;
        $this->siteRepo = $siteRepo;
        $this->sentry = $sentry;
        $this->theme = $theme->uses('default')->layout('default');
        $this->siteProvider = $siteProvider;

        $app->missing(function () {
            // For site that do not exists
            return View::make('site.invalid');
        });
    }

    protected function setupSite($site)
    {
        if (!$site instanceof Site) {
            // Abort app is page is not found
            $this->app->abort(404);
        }

        $this->siteProvider->setId($site->getId());
        $this->siteProvider->setEditMode(false);

        if (!$this->siteProvider->isPublished()) {
            $this->app->abort(404);
        }

        if (!$this->siteProvider->isValid()) {
            // The site data source could not be validated. Abort!!
            $this->app->abort(404);
        }

        if (!empty($this->siteProvider->theme()->name)) {
            // If the site has a theme set
            $this->theme->uses($this->siteProvider->theme()->name);
        }

        $this->theme->set('site', $this->siteProvider);
    }
}
