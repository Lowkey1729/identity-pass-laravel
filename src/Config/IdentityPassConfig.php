<?php

namespace IdentityPass\IdentityPass\Config;

class IdentityPassConfig
{
    /**
     * @return KeysConfig
     *
     */
    public static function getKeys(): KeysConfig
    {
        $configValues = config("identity-pass-laravel.keys.default");

        return new KeysConfig(
            $configValues['test_secret_key'],
            $configValues['test_public_key'],
            $configValues['live_public_key'],
            $configValues['live_secret_key'],
        );
    }
}
