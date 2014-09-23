<?php
use PageWeb\Extension\Sentry\SentryAdmin;
use PageWeb\Form\AdminLogin\AdminLoginForm;
use PageWeb\Form\Theme\ThemeCategoryForm;
use PageWeb\Form\Theme\ThemeForm;
use PageWeb\Repository\SiteRepository;
use PageWeb\Repository\SubscriptionRepository;
use PageWeb\Repository\ThemeCategoryRepository;
use PageWeb\Repository\ThemeRepository;

/**
 * @author Tiamiyu waliu
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class AdminController extends BaseController
{
    public function __construct(
        SentryAdmin $sentry,
        ThemeRepository $theme,
        AdminLoginForm $loginForm,
        ThemeCategoryRepository $themeCategory,
        AdminLoginForm $loginForm,
        SubscriptionRepository $subscriptionRepository,
        SiteRepository $siteRepository,
        ThemeForm $themeForm,
        ThemeCategoryForm $themeCategoryForm
    ) {
        $this->sentry = $sentry;
        $this->theme = $theme;
        $this->loginForm = $loginForm;
        $this->themeCategory = $themeCategory;
        $this->subscription = $subscriptionRepository;
        $this->site = $siteRepository;
        $this->themeForm = $themeForm;
        $this->themeCategoryForm = $themeCategoryForm;
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index()
    {
        if ($this->sentry->check()) {
            // If the user is already logged in,
            // Just redirect to dashboard
            return Redirect::route('admin.dashboard');
        }

        if (Request::isMethod('post')) {
            if ($this->loginForm->save(Input::all())) {
                return Redirect::route('admin.dashboard');
            }

            return Redirect::route('admin.index')
                ->withErrors($this->loginForm->errors())
                ->withInput();
        }

        return View::make('admin.index');
    }

    /**
     * Dashboard
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function dashboard()
    {
        return View::make('admin.dashboard', [
            'totalSites' => $this->site->getTotalSites(),
            'totalPublishedSites' => $this->site->getTotalPublished(),
            'totalUnPublishedSites' => $this->site->getTotalUnpublished()
        ]);
    }

    /**
     * Manage Theme
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function themes()
    {
        return View::make('admin.theme.list')
            ->with('themes', $this->theme->paginate(10));
    }

    /**
     * Create theme category
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function createThemeCategory()
    {
        $message = null;
        if (Request::isMethod('post')) {
            if ($this->themeCategoryForm->create(['name' => Input::get('name')])) {
                return Redirect::route('admin.theme.category');
            }

            return Redirect::refresh()->withErrors($this->themeCategoryForm->errors());
        }

        return View::make('admin.theme.category.create')->with('messages', $message);
    }

    /**
     * Create Theme
     *
     * @return \Illuminate\Http\RedirectResponse|Illuminate\View\View
     */
    public function createTheme()
    {
        $message = null;

        if (Request::isMethod('post') && ($val = Input::get('val'))) {
            if ($this->themeForm->create($val)) {
                return Redirect::route('admin.theme');
            }

            return Redirect::refresh()->withErrors($this->themeForm->errors());
        }

        return View::make('admin.theme.create', ['categories' => $this->themeCategory->getList(100)]);
    }

    /**
     * Edit Theme
     */
    public function editTheme($id)
    {
        $theme = $this->theme->findBy(['id' => $id]);

        if (!$theme) {
            return Redirect::route('admin.theme');
        }

        if (Request::isMethod('post') and ($val = Input::get('val'))) {
            if ($this->themeForm->update($id, $val)) {
                return Redirect::route('admin.theme');
            }

            return Redirect::refresh()->withErrors($this->themeForm->errors());
        }

        return View::make('admin.theme.edit', [
            'theme' => $theme,
            'categories' => $this->themeCategory->getList(100)
        ]);
    }

    /**
     * Theme Categories
     *
     * @return \Illuminate\View\View
     */
    public function themeCategories()
    {
        return View::make('admin.theme.category.list')->with('categories', $this->themeCategory->getList());
    }

    /**
     * Subscriptions
     */
    public function subscriptionList()
    {
        return View::make('admin.subscription.list', ['list' => $this->subscription->getList()]);
    }

    /**
     * Pages
     */
    public function sitesList()
    {
        $type = Input::query('type');
        if ($type == 'all') {
            $sites = $this->site->paginate(10);
        } else {
            $sites = $this->site->findByPublished(
                (Input::query('type') == 'published') ? true : false,
                10
            );
        }

        return View::make('admin.sites.list', ['sites' => $sites]);
    }

    public function publishSite($id)
    {
        $site = $this->site->findById($id);

        if($site)
        {
            $site->publish(1);
        }

        return Redirect::route('admin.sites');
    }
}
