<?php

namespace PageWebTests\Model;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class SiteAlbumTest extends \TestCase
{
    public function testRelations()
    {
        $site = $this->modelMuff->create('PageWeb\Model\Site');
        $album = $this->modelMuff->create('PageWeb\Model\SiteAlbum', ['save' => false]);

        $site->albums()->save($album);
        $this->assertEquals($album->site->getId(), $site->getId());
        $this->assertEquals($album->getId(), $site->albums()->first()->getId());
    }
}
