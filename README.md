# UAParser [![Build Status](https://secure.travis-ci.org/yzalis/UAParser.png)](http://travis-ci.org/yzalis/UAParser)

**UAParser** is a library which helps you parser UserAgent and detect browser, operating system, device and more. 

## Basic Usage
```php
<?php

// create a new UAParser instance
$uaParser = new \UAParser\UAParser();

// parse a user agent string an get the result
$result =  $uaParser->parse('Mozilla/5.0 (Windows NT 6.1; WOW64; rv:23.0) Gecko/20130406 Firefox/23.0.1');
```

## Results API

`Result` API
```php
$result->getBrowser() // BrowserResult
$result->getOperatingSystem() // OperatingSystemResult
$result->getDevice() // DeviceResult
```

`BrowserResult` API
```php
$result->getBowser()->getFamily() // Firefox
$result->getBowser()->getMajor() // 23
$result->getBowser()->getMinor() // 0
$result->getBowser()->getPatch() // 1
$result->getBowser()->getRenderingEngine() // Gecko
```

`OperatingSystemResult` API
```php
$result->getOperatingSystem()->getFamily() // Mac OS
$result->getOperatingSystem()->getMajor() // 10
$result->getOperatingSystem()->getMinor() // 8
$result->getOperatingSystem()->getPatch() // 4
```

`DeviceResult` API
```php
$result->getOperatingSystem()->getConstructor() // Apple
$result->getOperatingSystem()->getModel() // iPhone
$result->getOperatingSystem()->getType() // mobile
$result->getOperatingSystem()->isMobile() // true
$result->getOperatingSystem()->isTablet() // false
$result->getOperatingSystem()->isDesktop() // false
$result->getOperatingSystem()->is('mobile') // false
$result->getOperatingSystem()->is('tablet') // false
$result->getOperatingSystem()->is('desktop') // false
```

## Unit Tests

To run unit tests, you'll need cURL and a set of dependencies you can install using Composer:
    curl -sS https://getcomposer.org/installer | php
    php composer.phar install

Once installed, just launch the following command:
    phpunit

You're done.

## Credits

* Benjamin Laugueux <benjamin@yzalis.com>
* [All contributors](https://github.com/yzalis/UAParser/contributors)

## License

UAParser is released under the MIT License. See the bundled LICENSE file for details.