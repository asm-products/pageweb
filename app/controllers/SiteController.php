<?php

use Cartalyst\Sentry\Sentry;
use PageWeb\Form\Site\SiteForm;
use PageWeb\Repository\SiteRepository;
use PageWeb\Repository\SubscriptionPlanRepository;
use PageWeb\Repository\ThemeCategoryRepository;
use PageWeb\Repository\ThemeRepository;
use PageWeb\Site\ApiDataSource;
use PageWeb\Site\SiteProvider;
use PageWeb\Support\Facebook\GraphClientInterface;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class SiteController extends BaseController
{
    const FACEBOOK_HOST = 'facebook.com';

    public function __construct(
        Sentry $sentry,
        GraphClientInterface $graphClient,
        SiteRepository $siteRepo,
        SiteForm $siteForm,
        ThemeRepository $themeRepository,
        ThemeCategoryRepository $themeCategoryRepository,
        SubscriptionPlanRepository $subscriptionPlanRepo,
        SiteProvider $siteProvider
    ) {
        $this->client = $graphClient;
        $this->sentry = $sentry;
        $this->siteRepo = $siteRepo;
        $this->siteForm = $siteForm;
        $this->themeRepository = $themeRepository;
        $this->subscriptionPlanRepo = $subscriptionPlanRepo;
        $this->themeCategoryRepository = $themeCategoryRepository;
        $this->siteProvider = $siteProvider;
    }

    public function dashboard($siteId)
    {
        return View::make('site.dashboard', [
            'site' => $this->siteRepo->findById($siteId),
            'user' => $this->currentUser
        ]);
    }

    /**
     * Full Fledged & Advance Site layout & Pages Editor
     *
     * @param int $siteId
     * @return \Illuminate\View\View
     */
    public function editor($siteId)
    {
        $this->siteProvider->setId($siteId);
        $source = $this->siteProvider->getDataSource();
        if ($source instanceof ApiDataSource) {
            if (Input::query('theme') && ($theme = $this->themeRepository->findByName(Input::query('theme')))) {
                $source->setTheme($theme);
            }
        }

        if (!$this->siteProvider->inPreviewMode() && !$this->sentry->check()) {
            // We are not in quick preview mode and user is not logged in..
            // They sure can't see this editor
            return Redirect::route('home')->withErrors(['Invalid page'])->send();
        }

        $this->siteProvider->setEditMode(true);

        $themes = $this->themeRepository->paginate(0);
        $frameSrc = URL::route('editor.preview.home', [
                'site_id' => $this->siteProvider->getId()
            ]) . '?' . Request::getQueryString();

        return View::make('editor.editor')
            ->with('site', $this->siteProvider)
            ->with('user', $this->currentUser)
            ->with('themes', $themes)
            ->with('subscriptionPlans', $this->subscriptionPlanRepo->all())
            ->with('frameSrc', $frameSrc);
    }

    /**
     * Creates a new website from a page
     */
    public function create($pageId = null)
    {
        set_time_limit(0);

        if ($pageId) {
            // A page is selected;
            // Check if the page has already been converted to a site
            // By one of the page admins.
            if ($site = $this->siteRepo->findById($pageId)) {
                // If this site page has already been converted to a site,
                // Skip importing page and data and just assign user as site manager
                $this->siteRepo->assignManager($site, $this->sentry->getUser());
            } else {
                $site = $this->siteForm->create($pageId, $this->sentry->getUser());
            }

            if ($site) {
                return Redirect::route('sites.editor', ['site_id' => $site->getId()]);
            }

            return Redirect::route('sites.create')->withErrors($this->siteForm->errors());
        }

        // Get all pages user manages on facebook
        $pages = $this->client->getAllPages();

        return View::make('site.create', array(
            'pages' => $pages,
            'user' => $this->currentUser
        ));
    }
}
