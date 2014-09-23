<?php
use Cartalyst\Sentry\Sentry;
use PageWeb\SocialAuth\AuthenticationInterface;
use PageWeb\Support\Facebook\GraphClientInterface;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class UserController extends BaseController
{
    public function __construct(
        AuthenticationInterface $authentication,
        Sentry $sentry,
        GraphClientInterface $graphClient
    ) {
        $this->authentication = $authentication;
        $this->sentry = $sentry;
        $this->graphClient = $graphClient;
    }

    /**
     * User dashboard
     * - Lists all sites created by user
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        if (!$totalFacebookPages = Session::get('total_facebook_pages')) {
            // Gets the total number of facebook pages a user manages
            // and stores it in session so we don't have to request the
            // facebook graph api always
            $totalFacebookPages = count($this->graphClient->getAllPages());
            Session::put('total_facebook_pages', $totalFacebookPages);
        }

        return View::make('user.dashboard', array(
            'sites' => $this->currentUser->sites,
            'user' => $this->currentUser,
            'totalFacebookPages' => $totalFacebookPages
        ));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        if (!$this->sentry->check()) {
            // NO user session
            return Redirect::route('home');
        }

        $user = $this->sentry->getUser();
        $user->clearToken();
        $this->sentry->logout();

        if (($response = $this->authentication->logout()) && ($response instanceof Response)) {
            return $response;
        }

        return Redirect::route('home');
    }
}
