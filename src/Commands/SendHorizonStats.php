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
        HorizonMonitrFacade::collectAndSendStats();
    }
}
