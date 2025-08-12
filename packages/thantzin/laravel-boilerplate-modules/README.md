# Laravel-Modules
| **Laravel**  |  **laravel-boilerplate-modules** |
|---|---|
| 5.6  | ^3.0  |

`thantzin/laravel-boilerplate-modules` is a Laravel package which created to manage your large Laravel app using modules. Module is like a Laravel package, it has some views, controllers or models. This package is supported and tested in Laravel 5.

## Install

To install through Composer, by run the following command:

``` bash
composer require Thantzin/laravel-boilerplate-modules
```

The package will automatically register a service provider and alias.

Optionally, publish the package's configuration file by running:

``` bash
php artisan vendor:publish --provider="Thantzin\Modules\LaravelModulesServiceProvider"
```

### Autoloading

By default the module classes are not loaded automatically. You can autoload your modules using `psr-4`. For example:

``` json
{
  "autoload": {
    "psr-4": {
      "App\\": "app/",
      "Modules\\": "Modules/"
    }
  }
}
```

**Tip: don't forget to run `composer dump-autoload` afterwards.**

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
