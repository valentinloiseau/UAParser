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
            )
        ));

        $this->assertInstanceOf('UAParser\Result\Result', $result);
        $this->assertInstanceOf('UAParser\Result\ResultInterface', $result);
    
        $this->assertEquals('Safari', $result->getBrowser()->getFamily());
        $this->assertEquals(6, $result->getBrowser()->getMajor());
        $this->assertEquals(0, $result->getBrowser()->getMinor());
        $this->assertEquals(2, $result->getBrowser()->getPatch());
    }
}