# Laravel think kit.

![Packagist License](https://img.shields.io/packagist/l/yaroslawww/yaroslawww/laravel-thinkit?color=%234dc71f)
[![Packagist Version](https://img.shields.io/packagist/v/yaroslawww/yaroslawww/laravel-thinkit)](https://packagist.org/packages/yaroslawww/yaroslawww/laravel-thinkit)
[![Total Downloads](https://img.shields.io/packagist/dt/yaroslawww/yaroslawww/laravel-thinkit)](https://packagist.org/packages/yaroslawww/yaroslawww/laravel-thinkit)
[![Build Status](https://scrutinizer-ci.com/g/yaroslawww/yaroslawww/laravel-thinkit/badges/build.png?b=master)](https://scrutinizer-ci.com/g/yaroslawww/yaroslawww/laravel-thinkit/build-status/master)
[![Code Coverage](https://scrutinizer-ci.com/g/yaroslawww/yaroslawww/laravel-thinkit/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/yaroslawww/yaroslawww/laravel-thinkit/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/yaroslawww/yaroslawww/laravel-thinkit/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/yaroslawww/yaroslawww/laravel-thinkit/?branch=master)

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

## Credits

- [![Think Studio](https://yaroslawww.github.io/images/sponsors/packages/logo-think-studio.png)](https://think.studio/) 
