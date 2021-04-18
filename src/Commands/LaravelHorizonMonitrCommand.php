<?php

namespace Okaufmann\LaravelHorizonMonitr\Commands;

use Illuminate\Console\Command;

class LaravelHorizonMonitrCommand extends Command
{
    public $signature = 'laravel-horizon-monitr';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
