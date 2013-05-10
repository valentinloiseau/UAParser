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

    private $emailClient = null;

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

    public function getEmailClient()
    {
        return $this->emailClient;
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
        if (isset($data['device'])) {
            $this->device = new DeviceResult();
            $this->device->fromArray($data['device']);
        }
        if (isset($data['email_client'])) {
            $this->emailClient = new EmailClientResult();
            $this->emailClient->fromArray($data['email_client']);
        }
    }
}