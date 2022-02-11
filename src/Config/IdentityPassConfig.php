<?php

namespace IdentityPass\IdentityPass\Config;

class IdentityPassConfig
{
    /**
     * @return array
     *
     */
    public static function getKeys(): array
    {
        $configValues = config("identity-pass-laravel.keys.default");

        return [
            'keys' => $configValues,
        ];

    }
}
