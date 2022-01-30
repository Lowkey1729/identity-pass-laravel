<?php

namespace IdentityPass\IdentityPass;

use IdentityPass\IdentityPass\Commands\IdentityPassCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class IdentityPassServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('identity-pass-laravel')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_identity-pass-laravel_table')
            ->hasCommand(IdentityPassCommand::class);
    }
}
