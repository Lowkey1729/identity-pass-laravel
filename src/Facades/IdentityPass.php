<?php

namespace IdentityPass\IdentityPass\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \IdentityPass\IdentityPass\IdentityPass
 */
class IdentityPass extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'identity-pass-laravel';
    }
}
