<?php

namespace PageWebTests\Model;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class SiteTest extends \TestCase
{
    public function testRelations()
    {
        $site = $this->modelMuff->create('PageWeb\Model\Site');
        $album = $this->modelMuff->create('PageWeb\Model\SiteAlbum', ['save' => false]);
        $feed = $this->modelMuff->create('PageWeb\Model\SiteFeed', ['save' => false]);
        $post = $this->modelMuff->create('PageWeb\Model\SitePost', ['save' => false]);
        $event = $this->modelMuff->create('PageWeb\Model\SiteEvent', ['save' => false]);
        $photo = $this->modelMuff->create('PageWeb\Model\SitePhoto', ['save' => false]);

        $site->feeds()->save($feed);
        $site->albums()->save($album);
        $site->posts()->save($post);
        $site->events()->save($event);
        $site->photos()->save($photo);

        $this->assertEquals($site->theme->id, $site->theme_id);
        $this->assertEquals(1, $site->albums->count());
        $this->assertEquals(1, $site->feeds->count());
        $this->assertEquals(1, $site->posts->count());
        $this->assertEquals(1, $site->events->count());
        $this->assertEquals(1, $site->photos->count());
    }

    public function testPublishSite()
    {
        // Create a site model setting its is_published field to false
        $site = $this->modelMuff->create('PageWeb\Model\Site', [
            'relation' => false,
            'attributes' => [
                'is_published' => 0
            ]
        ]);

        $this->assertFalse($site->isPublished());
        $site->publish(true);
        $this->assertTrue($site->isPublished());
    }
}
