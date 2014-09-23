<?php

namespace PageWebTests\Repository;

use PageWeb\Model\Site;
use PageWeb\Repository\SiteRepository;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class SiteRepositoryTest extends \TestCase
{
    /**
     * @var SiteRepository
     */
    protected $siteRepo;

    public function setUp()
    {
        parent::setUp();

        $this->siteRepo = new SiteRepository($this->modelMuff->create('PageWeb\Model\Site', ['save' => false]));
    }

    public function testInstances()
    {
        $this->assertCount(0, $this->siteRepo->all()->toArray());

        // Create 5 sites
        $this->modelMuff->createMany(5, 'PageWeb\Model\Site', ['relation' => false]);
        $this->assertCount(5, $this->siteRepo->all()->toArray());
    }

    public function testPaginate()
    {
        $this->modelMuff->createMany(10, 'PageWeb\Model\Site', [
            'relation' => false
        ]);

        $paginator = $this->siteRepo->paginate(5);
        $this->assertInstanceOf('\Illuminate\Pagination\Paginator', $paginator);
        $this->assertCount(5, $paginator->getItems());
    }

    public function testFind()
    {
        $models = $this->modelMuff->createMany(5, 'PageWeb\Model\Site', ['relation' => false]);
        $site = $this->siteRepo->findById($models[1]->getId());
        $this->assertEquals($models[1]->getId(), $site->getId());

        $site = $this->siteRepo->findByName($models[2]->name);
        $this->assertEquals($models[2]->getId(), $site->getId());

        $publishedSites = $models->filter(function (Site $value) {
            return $value->isPublished();
        });

        $this->assertEquals(
            $publishedSites->count(),
            $this->siteRepo->getTotalPublished()
        );

        $this->assertEquals(
            ($models->count() - $publishedSites->count()),
            $this->siteRepo->getTotalUnpublished()
        );

        $this->assertEquals(5, $this->siteRepo->getTotalSites());
    }

    public function testCreateAndUpdateSiteModel()
    {
        $site = $this->siteRepo->create([
            'id' => '768564543243',
            'name' => 'contactlyapp',
            'subdomain' => 'contactlyapp',
            'title' => 'ContactlyApp',
            'email' => 'info@contactlyapp.com',
            'phone' => '0909875689897',
            'address' => 'No. 6 Herbert Macaulay',
            'about' => 'Some about text',
            'token' => '35l4123i4jh3kj4lwh4jl324h12kl3j412l3',
            'description' => 'Some description text'
        ]);

        $this->assertInstanceOf('\PageWeb\Model\Site', $site);
        $this->assertEquals('768564543243', $site->getId());

        $site = $this->siteRepo->update($site->getId(), [
            'name' => 'contactly'
        ]);

        $this->assertEquals('contactly', $site->name);

        // Test update fails
        $site = $this->siteRepo->update(800, [
            'named' => 'contactly'
        ]);

        $this->assertFalse($site);
    }

    public function testSetSubdomain()
    {
        $site = $this->modelMuff->create('PageWeb\Model\Site', ['relation' => false]);

        $this->setExpectedException('PageWeb\Support\Exception\ValidationException');
        $this->siteRepo->setSubDomain($site, 'admin');
        $result = $this->siteRepo->setSubDomain($site, 'contactly');

        $this->assertTrue($result);
        $this->assertEquals('contactly', $site->subdomain);
    }

    public function testAssignSiteManager()
    {
        /**
         * @var $user \User
         * @var $manager \User
         * @var $site \PageWeb\Model\Site
         */
        $user = $this->modelMuff->create('User');
        $manager = $this->modelMuff->create('User');
        $site = $this->modelMuff->create('PageWeb\Model\Site');

        $this->assertNotEquals($user, $manager);

        // Assign first site manager
        $this->siteRepo->assignManager($site, $user);

        // Assign another user as site manager
        $this->siteRepo->assignManager($site, $manager);

        // Try to assign a user that is already assigned to manage a site
        $this->siteRepo->assignManager($site, $user);

        $this->assertCount(1, $user->sites);
        $this->assertCount(1, $manager->sites);
        $this->assertCount(2, $site->users);
    }

    public function testOptions()
    {
        $this->assertFalse($this->siteRepo->setOption(1, 'header_text', 'Hello World!!'));

        /** @var $site Site */
        $site = $this->modelMuff->create('PageWeb\Model\Site');
        $created = $this->siteRepo->setOption($site->getId(), 'header_text', 'Hello World!');

        $this->assertTrue($created);
        $this->assertEquals('Hello World!', $site->getOption('header_text'));

        // Updating
        $this->siteRepo->setOption($site->getId(), 'header_text', 'The One!');
        $this->assertEquals('The One!', $site->getOption('header_text'));
    }

    public function tearDown()
    {
        parent::tearDown();
        $this->siteRepo = null;
    }
}
