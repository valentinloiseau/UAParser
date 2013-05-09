<?php

namespace UAParser\Tests;

use UAParser\UAParser;
use Symfony\Component\Yaml\Yaml;

/**
 * @author Benjamin Laugueux <benjamin@yzalis.com>
 */
class BrowserParserTest extends \PHPUnit_Framework_TestCase
{
    protected $uaParser;

    public function setUp()
    {
        $this->uaParser = new UAParser();
    }
        
    /**
     * @dataProvider browserDataProvider
     */
    public function testBrowserParser($uaString, $expectedFamily, $expectedMajor, $expectedMinor, $expectedPatch, $expectedRenderingEngine)
    {
        $result = $this->uaParser->parse($uaString);

        $this->assertEquals($expectedFamily, $result->getBrowser()->getFamily());
        $this->assertEquals($expectedMajor, $result->getBrowser()->getMajor());
        $this->assertEquals($expectedMinor, $result->getBrowser()->getMinor());
        $this->assertEquals($expectedPatch, $result->getBrowser()->getPatch());
        $this->assertEquals($expectedRenderingEngine, $result->getBrowser()->getRenderingEngine());
    }

    public function browserDataProvider()
    {
        return Yaml::parse(__DIR__.'/Fixtures/browsers.yml');
    }
}