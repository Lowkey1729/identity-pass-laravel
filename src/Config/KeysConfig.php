<?php

namespace IdentityPass\IdentityPass\Config;

class KeysConfig
{
    public function __construct(
        public string $live_secret_key,
        public string $live_public_key,
        public string $test_public_key,
        public string $test_secret_key,
    ) {
    }
}
