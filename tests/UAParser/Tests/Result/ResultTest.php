<?php

namespace UAParser\Tests\Result;

use UAParser\Result\ResultFactory;

/**
 * @author Benjamin Laugueux <benjamin@yzalis.com>
 */
class ResultTest  extends \PHPUnit_Framework_TestCase
{
    public function testNewInstance()
    {
        $factory = new ResultFactory();
        $result  = $factory->newInstance();

        $this->assertInstanceOf('UAParser\Result\Result', $result);
        $this->assertInstanceOf('UAParser\Result\ResultInterface', $result);
    }

    public function testCreateFromArray()
    {
        $factory = new ResultFactory();
        $result  = $factory->createFromArray(array(
            'browser' => array(
                'family' => 'Safari',
                'major'  => '6',
                'minor'  => '0',
                'patch'  => '2',
                'rendering_engine'  => 'WebKit',
            ),
            'operating_system' => array(
                'family' => 'Mac OS',
                'major' => '10',
                'minor' => '8',
                'patch' => '4',
            )
        ));

        $this->assertInstanceOf('UAParser\Result\Result', $result);
        $this->assertInstanceOf('UAParser\Result\ResultInterface', $result);

        $this->assertInstanceOf('UAParser\Result\BrowserResult', $result->getBrowser());
        $this->assertEquals('Safari', $result->getBrowser()->getFamily());
        $this->assertEquals(6, $result->getBrowser()->getMajor());
        $this->assertEquals(0, $result->getBrowser()->getMinor());
        $this->assertEquals(2, $result->getBrowser()->getPatch());
    
        $this->assertInstanceOf('UAParser\Result\OperatingSystemResult', $result->getOperatingSystem());
        $this->assertEquals('Mac OS', $result->getOperatingSystem()->getFamily());
        $this->assertEquals(10, $result->getOperatingSystem()->getMajor());
        $this->assertEquals(8, $result->getOperatingSystem()->getMinor());
        $this->assertEquals(4, $result->getOperatingSystem()->getPatch());
    }
}