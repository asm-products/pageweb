<?php

use PageWeb\Support\Facebook\GraphClientInterface;

class HomeController extends BaseController
{
    public function __construct(GraphClientInterface $graphClient)
    {
        $this->graphClient = $graphClient;
    }

    public function index()
    {
        if (Sentry::check()) {
            return Redirect::route('user.dashboard');
        }

        return View::make('home/index');
    }

    public function preview()
    {
        $url = Input::get('url');
        if (strpos($url, '://') === false) {
            $url = 'https://' . $url;
        }

        $parts = parse_url($url);

        if ((!isset($parts['host'])) || !in_array($parts['host'], array('facebook.com', 'www.facebook.com'))) {
            return Redirect::route('home')
                ->withErrors(['Url is not a valid facebook page url.']);
        }

        // Try to get the page name from the url
        $name = trim($parts['path'], '/');
        if (empty($name)) {
            return Redirect::route('home')
                ->withErrors(['Url is not a valid facebook page url.']);
        }

        $page = $this->graphClient->getPage($name);
        if (!isset($page['id'])) {
            return Redirect::route('home')->withErrors(trans('pages.invalid'));
        }

        return Redirect::to(URL::route('sites.editor', [
                'site_id' => $page['id']
            ]) . '?source=api&preview=true&theme=default');
    }

    /*
     * About Us Page
     */
    public function about()
    {
        return View::make('home/about');
    }

    /*
     * FAQ Page
     */
    public function faq()
    {
        return View::make('home/faq');
    }

    /*
     * Pricing
     */
    public function pricing()
    {
        return View::make('home/pricing');
    }
}
