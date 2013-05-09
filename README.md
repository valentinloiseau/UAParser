# UAParser [![Build Status](https://secure.travis-ci.org/yzalis/UAParser.png)](http://travis-ci.org/yzalis/UAParser)

**UAParser** is a library which helps you parser UserAgent and detect browser, operating system, device and more. 

## Basic Usage
```php
<?php

// create a new UAParser instance
$uaParser = new \UAParser\UAParser();

// parse a user agent string an get the result
$result =  $uaParser->parse('Mozilla/5.0 (Windows NT 6.1; WOW64; rv:23.0) Gecko/20130406 Firefox/23.0');
```

## Credits

* Benjamin Laugueux <benjamin@yzalis.com>
* [All contributors](https://github.com/yzalis/UAParser/contributors)

## License

UAParser is released under the MIT License. See the bundled LICENSE file for details.