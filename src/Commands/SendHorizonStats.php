<?php

namespace Okaufmann\LaravelHorizonMonitr\Commands;

use Illuminate\Console\Command;
use Okaufmann\LaravelHorizonMonitr\HorizonMonitrFacade;

class SendHorizonStats extends Command
{
    public $signature = 'laravel-horizon-monitr:send';

    public $description = 'Sends current Horizon stats to monitr';

    public function handle()
    {
        if (! config('laravel-horizon-monitr.monitr.token')) {
            $this->error('Horizon Monitr: No token was set! Please follow install instructions to set this package up.');

            return 1;
        }

        HorizonMonitrFacade::collectAndSendStats();
    }
}
