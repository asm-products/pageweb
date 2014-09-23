<?php

use PageWebTests\Utils\ModelMuff;

abstract class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * @var ModelMuff
     */
    protected $modelMuff;

    public function setUp()
    {
        parent::setUp();

        $this->prepareForTests();
        $this->prepareModels();
    }

    /**
     * Creates the application.
     *
     * @return \Symfony\Component\HttpKernel\HttpKernelInterface
     */
    public function createApplication()
    {
        $unitTesting = true;

        $testEnvironment = 'testing';

        return require __DIR__ . '/../../bootstrap/start.php';
    }

    public function prepareForTests()
    {
        // Migrate database for tests
        Artisan::call('migrate');

        // Set mail to pretend so mails are not actually sent
        Mail::pretend(true);
    }

    protected function prepareModels()
    {
        $this->modelMuff = new ModelMuff(Faker\Factory::create());

        $this->modelMuff->define('PageWeb\Model\Site', [
            'id' => 'string:id',
            'name' => 'string:username',
            'subdomain' => 'string:word',
            'title' => 'string:company',
            'email' => 'string:companyEmail',
            'phone' => 'string:phoneNumber',
            'photo' => 'string',
            'address' => 'string:address',
            'about' => 'text',
            'token' => 'string:sha256',
            'description' => 'text',
            'is_published' => 'int:boolean',
            'theme_id' => 'relation:PageWeb\Model\Theme'
        ]);

        $this->modelMuff->define('User', [
            'id' => 'string:id',
            'username' => 'string:username',
            'email' => 'string:email',
            'password' => 'string:sha256',
            'first_name' => 'string:firstName',
            'last_name' => 'string:lastName',
            'token' => 'string:sha256',
            'photo' => 'value::null',
            'activated' => 'value:1:int'
        ]);

        $this->modelMuff->define('PageWeb\Model\SiteAlbum', [
            'id' => 'string:randomNumber',
            'site_id' => 'relation:PageWeb\Model\Site',
            'title' => 'string:word',
            'type' => 'value:wall'
        ]);

        $this->modelMuff->define('PageWeb\Model\SiteFeed', [
            'id' => 'string:id',
            'site_id' => 'relation:PageWeb\Model\Site',
            'content' => 'text:short',
            'type' => 'value:status',
            'link' => 'string:url',
            'link_title' => 'string:paragraph',
            'link_description' => 'string',
            'created_at' => 'string:dateTimeThisYear'
        ]);

        $this->modelMuff->define('PageWeb\Model\SitePost', [
            'id' => 'string:id',
            'title' => 'string:paragraph',
            'site_id' => 'relation:PageWeb\Model\ThemeCategory',
            'content' => 'text:medium',
            'created_at' => 'string:dateTimeThisYear',
            'updated_at' => 'string:dateTimeThisMonth'
        ]);

        $this->modelMuff->define('PageWeb\Model\SitePhoto', [
            'id' => 'string:id',
            'album_id' => 'connection:PageWeb\Model\SiteAlbum',
            'site_id' => 'connection:PageWeb\Model\Site',
            'type' => 'enum:wall,normal,cover',
            'caption' => 'text:short',
            'url' => 'string:url',
            'created_at' => 'string:dateTimeThisYear'
        ]);

        $this->modelMuff->define('PageWeb\Model\SiteEvent', [
            'id' => 'string:id',
            'title' => 'string:paragraph',
            'site_id' => 'relation:PageWeb\Model\ThemeCategory',
            'start_time' => 'string:dateTimeThisYear',
            'end_time' => 'string:dateTimeThisYear',
            'description' => 'string:dateTimeThisMonth',
            'photo' => 'string'
        ]);

        $this->modelMuff->define('PageWeb\Model\Theme', [
            'name' => 'string:word',
            'description' => 'text',
            'category_id' => 'relation:PageWeb\Model\ThemeCategory'
        ]);

        $this->modelMuff->define('PageWeb\Model\ThemeCategory', [
            'name' => 'string:name'
        ]);
    }
}
