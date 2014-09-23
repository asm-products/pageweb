<?php

namespace PageWebTests\Controller;

use URL;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class AjaxSiteControllerTest extends \TestCase
{
    public function testGetAllSites()
    {
        $sites = $this->modelMuff->createMany(3, 'PageWeb\Model\Site');
        $response = $this->call('GET', URL::to('xhr/sites'));
        $this->assertResponseOk();

        $this->assertEquals(3, count($response->getData()));
    }

    public function testUpdateSubdomain()
    {
        $site = $this->modelMuff->create('PageWeb\Model\Site');
        $this->call('POST', URL::to('/xhr/sites/' . $site->getId() . '/subdomain'), ['subdomain' => 'xtodz']);

        $this->assertResponseOk();
        $this->assertEquals('xtodz', $site->find($site->getId())->subdomain);
    }

    public function testUpdateSubdomainFails()
    {
        $site = $this->modelMuff->create('PageWeb\Model\Site');
        // Try to use a black listed word
        $this->call('POST', URL::to('/xhr/sites/' . $site->getId() . '/subdomain'), ['subdomain' => 'admin']);

        $this->assertResponseOk();
        $this->assertEquals($site->subdomain, $site->find($site->getId())->subdomain);
    }

    public function testSetOptionXEditable()
    {
        $site = $this->modelMuff->create('PageWeb\Model\Site');
        $this->call('POST', URL::to('/xhr/sites/' . $site->getId() . '/options'), [
            '_x_editable_' => true,
            'name' => 'option-site_description',
            'value' => 'Dead Fun Club. Really!'
        ]);

        $this->assertResponseOk();
        $this->assertEquals(
            'Dead Fun Club. Really!',
            $site->find($site->getId())->getOption('site_description')
        );
    }

    public function testSetOption()
    {
        $site = $this->modelMuff->create('PageWeb\Model\Site');
        $this->call('POST', URL::to('/xhr/sites/' . $site->getId() . '/options'), [
            'site_description' => 'Dead Fun Club. Really!',
            'site_motto' => 'PHP Developers lack humor.'
        ]);

        $this->assertResponseOk();
        $this->assertEquals('Dead Fun Club. Really!', $site->getOption('site_description'));
        $this->assertEquals('PHP Developers lack humor.', $site->getOption('site_motto'));
    }
}
