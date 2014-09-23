<?php

namespace PageWebTests\Model;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class SiteEventTest extends \TestCase
{
    public function testRelationToSite()
    {
        $site = $this->modelMuff->create('PageWeb\Model\Site');
        $event = $this->modelMuff->create('PageWeb\Model\SiteEvent', ['save' => false]);

        $site->posts()->save($event);
        $this->assertEquals($event->site->getId(), $site->getId());
        $this->assertEquals($event->getId(), $site->events()->first()->getId());
    }
}
