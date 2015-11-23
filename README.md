# A laravel session timeout middleware

[![Latest Stable Version](https://poser.pugx.org/unicodeveloper/laravel-sessiontimeout/v/stable.svg)](https://packagist.org/packages/unicodeveloper/laravel-sessiontimeout)
![](https://img.shields.io/badge/unicodeveloper-approved-brightgreen.svg)
[![License](https://poser.pugx.org/unicodeveloper/laravel-sessiontimeout/license.svg)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/unicodeveloper/laravel-sessiontimeout.svg)](https://travis-ci.org/unicodeveloper/laravel-mentions)
[![Quality Score](https://img.shields.io/scrutinizer/g/unicodeveloper/laravel-sessiontimeout.svg?style=flat-square)](https://scrutinizer-ci.com/g/unicodeveloper/laravel-sessiontimeout)
[![Total Downloads](https://img.shields.io/packagist/dt/unicodeveloper/laravel-sessiontimeout.svg?style=flat-square)](https://packagist.org/packages/unicodeveloper/laravel-sessiontimeout)



## Installation

First, pull in the package through Composer.

```js
"require": {
    "unicodeveloper/laravel-sessiontimeout": "1.0.*"
}
```

Next you must add the \Unicodeveloper\SessionTimeOut\Middleware\FilterIfPjax-middleware to the kernel.

```php
// app/Http/Kernel.php

...
protected $middleware = [
    ...
    \Unicodeveloper\SessionTimeout\Middleware\MakeSessionTimeout::class,
];
```

## Install

Via Composer

``` bash
$ composer require unicodeveloper/laravel-sessiontimeout
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.


## Credits

- [Prosper Otemuyiwa](https://twitter.com/unicodeveloper)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

