# Laravel Artisan Command 

This package add artisan command to generate combinations of strings pairs without repetition


## Installation

In your terminal:

```sh
composer require jakubhanak/laravel-additional-command
```

If you are on Laravel 5.4 (no need for Laravel 5.5 and higher), register the service provider to your `config/app.php` file:

```php
'providers' => [
    ...
    Hanak\ArtisanCommand\ArtisanCommandServiceProvider::class,
];
```



## Usage

#### `string:combine`

This command accept array of strings to the input attribute and result is combinations of strings in pairs without repetition.

```
php artisan string:combine {strings}
```

Example of usage.

```
php artisan string:combine one two three
php artisan string:combine one,two,three

```

## Licence

Open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).