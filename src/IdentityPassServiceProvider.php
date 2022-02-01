<?php

namespace IdentityPass\IdentityPass;

use IdentityPass\IdentityPass\Commands\IdentityPassCommand;
use IdentityPass\IdentityPass\Transact\Identify;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class IdentityPassServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('identity-pass-laravel')
            ->hasConfigFile()
            ->hasCommand(IdentityPassCommand::class);
    }

    public function packageRegistered(): void
    {
        $this->app->bind('identity-pass-laravel', function () {
            return new Identify();
        });
    }
}
