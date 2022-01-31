<?php

namespace IdentityPass\IdentityPass;

use IdentityPass\IdentityPass\Commands\IdentityPassCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class IdentityPassServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('identity-pass-laravel')
            ->hasConfigFile()
            ->hasViews()
            ->hasCommand(IdentityPassCommand::class);
    }
}
