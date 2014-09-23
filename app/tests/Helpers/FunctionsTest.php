<?php

namespace PageWebTests\Helpers;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class FunctionsTest extends \TestCase
{
    public function testDetectDomain()
    {
        $this->assertEquals('pageweb.app', detect_domain('local'));
        $this->assertEquals('pageweb.app', detect_domain('dev'));
        $this->assertEquals('thefatteninggroom.com', detect_domain('staging'));
        $this->assertEquals('pageweb.co', detect_domain('production'));
        $this->assertNull(detect_domain('live'));
    }

    public function testHttpReplaceQuery()
    {
        $url = 'http://pageweb.co/some/path?source=api&theme=onassis';
        parse_str(parse_url($url, PHP_URL_QUERY), $query);

        $this->assertArrayHasKey('theme', $query);
        $this->assertEquals('onassis', $query['theme']);

        $url = http_replace_query($url, ['theme' => 'default']);
        parse_str(parse_url($url, PHP_URL_QUERY), $query);

        $this->assertArrayHasKey('theme', $query);
        $this->assertEquals('default', $query['theme']);
    }

    public function testIsMainSite()
    {
        $this->assertTrue(is_main_site('pageweb.app'));
        $this->assertFalse(is_main_site('codulab.com'));

        $_SERVER['HTTP_HOST'] = 'www.codulab.com';
        $this->assertFalse(is_main_site());
    }
}
