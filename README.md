# Laravel think kit.

![Packagist License](https://img.shields.io/packagist/l/yaroslawww/laravel-thinkit?color=%234dc71f)
[![Packagist Version](https://img.shields.io/packagist/v/yaroslawww/laravel-thinkit)](https://packagist.org/packages/yaroslawww/laravel-thinkit)
[![Total Downloads](https://img.shields.io/packagist/dt/yaroslawww/laravel-thinkit)](https://packagist.org/packages/yaroslawww/laravel-thinkit)
[![Build Status](https://scrutinizer-ci.com/g/yaroslawww/laravel-thinkit/badges/build.png?b=master)](https://scrutinizer-ci.com/g/yaroslawww/laravel-thinkit/build-status/master)
[![Code Coverage](https://scrutinizer-ci.com/g/yaroslawww/laravel-thinkit/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/yaroslawww/laravel-thinkit/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/yaroslawww/laravel-thinkit/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/yaroslawww/laravel-thinkit/?branch=master)

Laravel small kit for quicker development.

## Installation

Install the package via composer:

```bash
composer require yaroslawww/laravel-thinkit
```

Optionally you can publish the config file with:

```bash
php artisan vendor:publish --provider="ThinKit\ServiceProvider" --tag="config"
```

## Usage

### Helpers

#### SQL

```php
\ThinKit\Helpers\Sql::readableSqlFromQuery(MyModel::whereKey(123));
```

#### URL

```php
\ThinKit\Helpers\Url::addOrUpdateArgs('https://my.path.co.uk?example=foo&test=bar', 'new', 'baz');
```

#### DateTime

```php
$formats = [
            'Y-m-d',
            'Y-m-d\TH:i:s',
        ];
        
$carbonDate = \ThinKit\Helpers\DateTime::createFromMultipleFormats($formats, '2022-09-28T08:19:00');
$carbonDate->format('Y-m-d H:i:s');
```

## Credits

- [![Think Studio](https://yaroslawww.github.io/images/sponsors/packages/logo-think-studio.png)](https://think.studio/) 
