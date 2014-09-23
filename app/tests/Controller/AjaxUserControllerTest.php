<?php

namespace PageWebTests\Controller;

use URL;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class AjaxUserControllerTest extends \TestCase
{
    public function testGetAllUserSites()
    {
        $user = $this->modelMuff->create('User');
        $sites = $this->modelMuff->createMany(3, 'PageWeb\Model\Site', ['create' => false]);

        foreach ($sites as $site) {
            $user->sites()->save($site);
        }

        $this->assertCount(3, $user->sites);

        $response = $this->call('GET', URL::to('/xhr/sites'));
        $this->assertResponseOk();

        $this->assertCount(3, $response->getData());
    }
}
