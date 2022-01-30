<?php

namespace IdentityPass\IdentityPass\Commands;

use Illuminate\Console\Command;
use Src\Classes\CurlClient;

class IdentityPassCommand extends Command
{
    public $signature = 'identity-pass-laravel';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }


}
