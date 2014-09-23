<?php

namespace PageWebTests\Controller;

use Sentry;
use URL;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class UserControllerTest extends \TestCase
{
    public function testUserIsRedirectedToLoginFromDashboard()
    {
        \Route::enableFilters();
        $this->call('GET', URL::to('dashboard'));

        // User is not logged in
        $this->assertRedirectedToRoute('login');
    }

    public function testDashboard()
    {
        $this->assertFalse(\Session::has('total_facebook_pages'));

        $user = $this->modelMuff->create('User', [
            'attributes' => [
                // Set the user ID so we can use it to get the total number of
                // pages the user has.. ie from dummy graph client
                'id' => '1128672011'
            ]
        ]);

        // Make Sentry::getUser() return our own user model
        Sentry::shouldReceive('getUser')->once()->andReturn($user);

        $this->call('GET', URL::to('/dashboard'));

        // Test that the total facebook pages is cached in session
        $this->assertEquals(3, \Session::get('total_facebook_pages'));

        $this->assertResponseOk();
        $this->assertViewHas('sites', $user->sites);
        $this->assertViewHas('user', $user);
        $this->assertViewHas('totalFacebookPages', 3);
    }
}
