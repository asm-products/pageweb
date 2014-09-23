<?php

namespace PageWebTests\Toolbox;

use PageWeb\Toolbox\WordBlacklist;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class WordBlacklistTest extends \TestCase
{
    public function testBasicString()
    {
        $wordBlackList = new WordBlacklist();

        $this->assertTrue($wordBlackList->check('morrelinko'));
        $this->assertTrue($wordBlackList->check('onassis'));
        $this->assertTrue($wordBlackList->check('contactly'));
        $this->assertFalse($wordBlackList->check('admin'));
        $this->assertFalse($wordBlackList->check('fuck'));
    }

    public function testPatternedString()
    {
        $wordBlackList = new WordBlacklist();

        $this->assertFalse($wordBlackList->check('beta' . rand(1, 999)));
        $this->assertFalse($wordBlackList->check('email'));
        $this->assertFalse($wordBlackList->check('mail'));
        $this->assertFalse($wordBlackList->check('ns' . rand(1, 999)));
        $this->assertFalse($wordBlackList->check('ns10'));
    }
}
