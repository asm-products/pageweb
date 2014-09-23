<?php

namespace PageWebTests\Model;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class SiteFeedTest extends \TestCase
{
    public function testRelations()
    {
        $site = $this->modelMuff->create('PageWeb\Model\Site');
        $feed = $this->modelMuff->create('PageWeb\Model\SiteFeed', ['save' => false]);

        $site->feeds()->save($feed);
        $this->assertEquals($feed->site->id, $site->getId());
        $this->assertEquals($feed->id, $site->feeds()->first()->id);
    }
}
