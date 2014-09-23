<?php

namespace PageWeb\Filter;

use Cartalyst\Sentry\Sentry;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Redirect;
use URL;
use User;

/**
 * Filter checks if a page can be managed by the current user
 * If its an ajax request returns a json response
 * Otherwise, redirects back to specified url of first parameter
 *
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class SiteManagerFilter
{
    public function __construct(Sentry $sentry)
    {
        $this->sentry = $sentry;
    }

    /**
     * @param Route $route
     * @param Request $request
     * @param null $redirect Route to redirect to
     * @return RedirectResponse
     */
    public function filter(Route $route, Request $request, $redirect = null)
    {
        // Generate response
        if ($request->ajax()) {
            // If the request is ajax, return an error json response
            $response = new JsonResponse(['errors' => true, 'error_message' => 'Access denied.']);
        } else {
            if ($redirect == null) {
                $redirect = URL::route('home');
            }

            $response = Redirect::to($redirect);
        }

        if ($this->sentry->check()) {
            // If the user is authenticated
            /** @var $user User */
            $user = $this->sentry->getUser();

            if (!$user->sites()->wherePivot('site_id', '=', $route->parameter('site_id'))->first()) {
                // Checks if the user can manage a page
                return $response;
            }
        } else {
            // User is not authenticated
            if ($request->input('preview') === false) {
                // We are not in quick preview mode
                return $response;
            }
        }
    }
}
