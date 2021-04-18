# Laravel Horizon Monitr

[![Latest Version on Packagist](https://img.shields.io/packagist/v/okaufmann/laravel-horizon-monitr.svg?style=flat-square)](https://packagist.org/packages/okaufmann/laravel-horizon-monitr)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/okaufmann/laravel-horizon-monitr/run-tests?label=tests)](https://github.com/okaufmann/laravel-horizon-monitr/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/okaufmann/laravel-horizon-monitr/Check%20&%20fix%20styling?label=code%20style)](https://github.com/okaufmann/laravel-horizon-monitr/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/okaufmann/laravel-horizon-monitr.svg?style=flat-square)](https://packagist.org/packages/okaufmann/laravel-horizon-monitr)

Use to collect horizon stats and send them to monitr.

## Installation

You can install the package via composer:

```bash
composer require okaufmann/laravel-horizon-monitr
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="Okaufmann\LaravelHorizonMonitr\LaravelHorizonMonitrServiceProvider" --tag="laravel-horizon-monitr-migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Okaufmann\LaravelHorizonMonitr\LaravelHorizonMonitrServiceProvider" --tag="laravel-horizon-monitr-config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$laravel-horizon-monitr = new Okaufmann\LaravelHorizonMonitr();
echo $laravel-horizon-monitr->echoPhrase('Hello, Spatie!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Credits

- [Oliver Kaufmann](https://github.com/okaufmann)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
