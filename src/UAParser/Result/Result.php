<?php

namespace UAParser\Result;

/**
 * @author Benjamin Laugueux <benjamin@yzalis.com>
 */
class Result implements ResultInterface
{
    private $browser = null;
    
    private $operatingSystem = null;

    private $device = null;

    public function getBrowser()
    {
        return $this->browser;
    }

    public function getOperatingSystem()
    {
        return $this->operatingSystem;
    }

    public function getDevice()
    {
        return $this->device;
    }

    /**
     * {@inheritDoc}
     */
    public function fromArray(array $data = array())
    {
        if (isset($data['browser'])) {
            $this->browser = new BrowserResult();
            $this->browser->fromArray($data['browser']);
        }
        if (isset($data['operating_system'])) {
            $this->operatingSystem = new OperatingSystemResult();
            $this->operatingSystem->fromArray($data['operating_system']);
        }
    }
}