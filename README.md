# Session

[![GitHub release](https://img.shields.io/github/release/codezero-be/session.svg)]()
[![License](https://img.shields.io/packagist/l/codezero/session.svg)]()
[![Build Status](https://img.shields.io/travis/codezero-be/session.svg?branch=master)](https://travis-ci.org/codezero-be/session)
[![Scrutinizer](https://img.shields.io/scrutinizer/g/codezero-be/session.svg)](https://scrutinizer-ci.com/g/codezero-be/session)
[![Total Downloads](https://img.shields.io/packagist/dt/codezero/session.svg)](https://packagist.org/packages/codezero/session)

### Manage session data.

This package includes an adapter for Laravel's [`Session Store`](http://laravel.com/docs/5.0/session), to enable the use of other implementations in non-Laravel projects.

## Installation

Install this package through Composer:

    composer require codezero/session

## Vanilla PHP Implementation

Autoload the vendor classes:

    require_once 'vendor/autoload.php'; // Path may vary

And then use the `VanillaSession` implementation:

    $session = new \CodeZero\Session\VanillaSession();

## Laravel 5 Implementation

Add a reference to `LaravelSessionServiceProvider` to the providers array in `config/app.php`:

    'providers' => [
        'CodeZero\Session\LaravelSessionServiceProvider'
    ]

Then you can "make" (or inject) a `Cookie` instance anywhere in your app:

    $session = \App::make('CodeZero\Session\Session');

> **TIP:** Laravel's [IoC container](http://laravel.com/docs/5.0/container) will automatically provide the Laravel specific `Session` implementation. This will use Laravel's [`Session`](http://laravel.com/docs/5.0/session) goodness behind the scenes!

## Usage

### Store data in the session

    $session->store('key', 'value');
    $session->store('key', ['array' => 'value']);

### Get session data

If a key doesn't exist, `null` will be returned.


    $array = $session->get(); // An array of all data
    $value = $session->get('key'); // Specific data

### Delete session data

    $session->flush(); // Clear all data
    $session->delete('key'); // Clear specific data

### Destroy the session

This will flush all data and regenerate the session ID.

    $session->destroy();
 
## Testing

    $ vendor/bin/phpspec run

## Security

If you discover any security related issues, please [e-mail me](mailto:ivan@codezero.be) instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

---
[![Analytics](https://ga-beacon.appspot.com/UA-58876018-1/codezero-be/session)](https://github.com/igrigorik/ga-beacon)