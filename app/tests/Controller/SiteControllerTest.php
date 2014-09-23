<?php

namespace PageWebTests\Controller;

use PageWeb\Repository\SiteRepository;
use URL;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class SiteControllerTest extends \TestCase
{
    public function testDashboard()
    {
        $user = $this->modelMuff->create('User', [
            'attributes' => [
                'id' => '1128672011'
            ]
        ]);

        $this->modelMuff->create('PageWeb\Model\Site', [
            'save' => true,
            'attributes' => [
                'id' => '206758826147180'
            ]
        ]);

        // Mock getUser() and check() methods of Sentry
        \Sentry::shouldReceive('getUser')->once()->andReturn($user);
        \Sentry::shouldReceive('check')->once()->andReturn(true);

        $this->call('GET', URL::to('/site/206758826147180'));
        $this->assertResponseOk();
        $this->assertViewHas('site');
        $this->assertViewHas('user');
    }

    public function testEditor()
    {
        $user = $this->modelMuff->create('User', [
            'attributes' => [
                'id' => '1128672011'
            ]
        ]);

        // Create and save a site to the database
        $this->modelMuff->create('PageWeb\Model\Site', [
            'save' => true,
            'attributes' => [
                'id' => '206758826147180'
            ]
        ]);

        // Mock getUser() and check() methods of Sentry
        \Sentry::shouldReceive('getUser')->once()->andReturn($user);
        \Sentry::shouldReceive('check')->once()->andReturn(true);

        $response = $this->call('GET', URL::to('/site/206758826147180/editor'));

        /** @var $view \Illuminate\View\View */
        $view = $response->original;
        $data = $view->getData();

        /** @var $site \PageWeb\Site\SiteProvider */
        $site = $data['site'];

        $this->assertEquals($site->site->getId(), $site->getId());
        $this->assertInstanceOf('Illuminate\View\View', $view);
        $this->assertInstanceOf('PageWeb\Site\DatabaseDataSource', $site->getDataSource());

        $this->assertResponseOk();
        $this->assertViewHas('site', $site);
        $this->assertViewHas('themes');
        $this->assertViewHas('subscriptionPlans');
        $this->assertViewHas('frameSrc');
    }

    public function testEditorInPreviewMode()
    {
        // Create default theme
        $theme = $this->modelMuff->create('PageWeb\Model\Theme', [
            'attributes' => [
                'name' => 'default'
            ]
        ]);

        // User is not logged in and we are in quick preview mode
        $response = $this->call('GET', URL::to('/site/206758826147180/editor?source=api&preview=true&theme=default'));

        /** @var $view \Illuminate\View\View */
        $view = $response->original;
        $data = $view->getData();

        /** @var $site \PageWeb\Site\SiteProvider */
        $site = $data['site'];

        $this->assertResponseOk();
        $this->assertViewHas('themes');
        $this->assertViewHas('subscriptionPlans');
        $this->assertViewHas('frameSrc');
        $this->assertInstanceOf('PageWeb\Site\ApiDataSource', $site->getDataSource());
    }

    public function testCreateSite()
    {
        $this->prepareSiteRepo();

        // List of pages users manage
        $this->call('GET', URL::to('/create'));
        $this->assertResponseOk();

        // Mimic selecting one page
        $this->call('GET', URL::to('/create/206758826147180'));
        $this->assertRedirectedToRoute('sites.editor', ['site_id' => '206758826147180']);
    }

    public function testCreateSiteFromNonExistingPage()
    {
        $this->prepareSiteRepo();

        $this->call('GET', URL::to('/create/2067588'));
        $this->assertRedirectedToRoute('sites.create');
        $this->assertSessionHas('errors');
    }

    protected function prepareSiteRepo()
    {
        $user = $this->modelMuff->create('User', [
            'attributes' => [
                'id' => '1128672011'
            ]
        ]);

        // Create default theme
        $this->modelMuff->create('PageWeb\Model\Theme', [
            'attributes' => [
                'name' => 'default'
            ]
        ]);

        \Sentry::shouldReceive('getUser')->once()->andReturn($user);
        \Sentry::shouldReceive('check')->once()->andReturn(true);

        $this->app->bind('PageWeb\Repository\SiteRepository', function ($app) {
            $model = $this->modelMuff->create('PageWeb\Model\Site');

            return new SiteRepository($model);
        });
    }
}
