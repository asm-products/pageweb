<?php

namespace PageWebTests\Model;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class SitePostTest extends \TestCase
{
    public function testRelationToSite()
    {
        $site = $this->modelMuff->create('PageWeb\Model\Site');
        $post = $this->modelMuff->create('PageWeb\Model\SitePost', ['save' => false]);

        $site->posts()->save($post);
        $this->assertEquals($post->site->getId(), $site->getId());
        $this->assertEquals($post->getId(), $site->posts()->first()->getId());
    }
}
