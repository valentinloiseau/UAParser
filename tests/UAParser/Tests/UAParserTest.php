<?php

namespace UAParser\Tests;

use UAParser\UAParser;

/**
 * @author Benjamin Laugueux <benjamin@yzalis.com>
 */
class UAParserTest extends \PHPUnit_Framework_TestCase
{
    public function testClass()
    {
        $uaParser = new UAParser();

        $this->assertInstanceOf('UAParser\UAParser', $uaParser);
        $this->assertInstanceOf('UAParser\UAParserInterface', $uaParser);
    }
}