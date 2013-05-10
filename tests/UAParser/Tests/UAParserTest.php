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
        $result = $uaParser->parse('');

        $this->assertInstanceOf('UAParser\UAParser', $uaParser);
        $this->assertInstanceOf('UAParser\UAParserInterface', $uaParser);
        $this->assertInstanceOf('UAParser\Result\DeviceResult', $result->getDevice());
        $this->assertInstanceOf('UAParser\Result\DeviceResultInterface', $result->getDevice());
        $this->assertInstanceOf('UAParser\Result\OperatingSystemResult', $result->getOperatingSystem());
        $this->assertInstanceOf('UAParser\Result\OperatingSystemResultInterface', $result->getOperatingSystem());
        $this->assertInstanceOf('UAParser\Result\BrowserResult', $result->getBrowser());
        $this->assertInstanceOf('UAParser\Result\BrowserResultInterface', $result->getBrowser());
        $this->assertInstanceOf('UAParser\Result\EmailClientResult', $result->getEmailClient());
        $this->assertInstanceOf('UAParser\Result\EmailClientResultInterface', $result->getEmailClient());
    }
}