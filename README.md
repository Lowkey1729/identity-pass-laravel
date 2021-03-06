# About

[![Latest Version on Packagist](https://img.shields.io/packagist/v/identity-pass/identity-pass-laravel.svg?style=flat-square)](https://packagist.org/packages/identity-pass/identity-pass-laravel)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/identity-pass/identity-pass-laravel/run-tests?label=tests)](https://github.com/identity-pass/identity-pass-laravel/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/identity-pass/identity-pass-laravel/Check%20&%20fix%20styling?label=code%20style)](https://github.com/identity-pass/identity-pass-laravel/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/identity-pass/identity-pass-laravel.svg?style=flat-square)](https://packagist.org/packages/identity-pass/identity-pass-laravel)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/identity-pass-laravel.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/identity-pass-laravel)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require identity-pass/identity-pass-laravel
```

You can publish and run the migrations with:


You can publish the config file with:

```bash
php artisan vendor:publish --tag="identity-pass-laravel-config"
```

This is the contents of the published config file:

```php
return [

    

];
```



## Usage

```php
$identityPass = new use IdentityPass\IdentityPass\Identity\IdentityPass;
return  $identityPass::getBankCodes();
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [ Olarewaju Mojeed Olalekan](https://github.com/ Lowkey1729)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
