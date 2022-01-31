<?php

namespace IdentityPass\IdentityPass;

use IdentityPass\IdentityPass\Commands\IdentityPassCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
<<<<<<< HEAD
=======
use Illuminate\Support\ServiceProvider;
use IdentityPass\IdentityPass\Transact\Identify;
>>>>>>> e55e055 (api integration)

class IdentityPassServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('identity-pass-laravel')
            ->hasConfigFile()
            ->hasCommand(IdentityPassCommand::class);
    }
<<<<<<< HEAD
=======

    public function packageRegistered(): void
    {
        $this->app->bind('identity-pass-laravel', function () {
            return new Identify();
        });
    }




>>>>>>> e55e055 (api integration)
}
