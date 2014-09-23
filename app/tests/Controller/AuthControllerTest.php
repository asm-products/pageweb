<?php

namespace PageWebTests\Controller;

use PageWeb\SocialAuth\DummyAuthentication;
use URL;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class AuthControllerTest extends \TestCase
{
    /**
     * @var \PageWeb\SocialAuth\AuthenticationInterface
     */
    protected $authenticator;

    public function setUp()
    {
        parent::setUp();
    }

    public function testLogin()
    {
        $response = $this->call('GET', URL::to('/login'));
        $this->assertResponseOk();
        $this->assertInstanceOf('Illuminate\View\View', $response->original);
    }

    public function testLoginFacebook()
    {
        // Test that no user exists in database
        $user = $this->modelMuff->create('User', ['save' => false]);
        $this->assertCount(0, $user->all());

        $this->prepareAuthenticator();
        $this->call('GET', URL::to('login/facebook'));
        $this->assertRedirectedToRoute('login.callback', ['provider' => 'facebook']);
        $this->call('GET', URL::to('/login/facebook/callback'));
        $this->assertRedirectedToRoute('user.dashboard');

        // Test that a user has been created
        $this->assertCount(1, $user->all());
    }

    public function testLoginFacebookFail()
    {
        $this->prepareAuthenticator(123);
        $this->call('GET', URL::to('/login/facebook/callback'));
        $this->assertRedirectedToRoute('login');
        $this->assertSessionHas('errors');
    }

    public function tearDown()
    {
        parent::tearDown();
    }

    protected function prepareAuthenticator($userId = null)
    {
        $this->app->bind('PageWeb\SocialAuth\AuthenticationInterface', function ($app) use ($userId) {
            $authenticator = new DummyAuthentication($app['pageweb.facebook-graph-dummy']);
            if ($userId) {
                $authenticator->setUserId($userId);
            }

            return $authenticator;
        });
    }
}
