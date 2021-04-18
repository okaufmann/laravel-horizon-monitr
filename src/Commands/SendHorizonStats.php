<?php

namespace Okaufmann\LaravelHorizonMonitr\Commands;

use Illuminate\Console\Command;
use Okaufmann\LaravelHorizonMonitr\HorizonStats;
use Okaufmann\LaravelHorizonMonitr\Monitr\Client;
use Okaufmann\LaravelHorizonMonitr\Monitr\HorizonStatsDto;

class SendHorizonStats extends Command
{
    public $signature = 'laravel-horizon-monitr:send';

    public $description = 'Sends current Horizon stats to monitr';

    public function handle()
    {
        $monitr = app(Client::class);
        $horizon = app(HorizonStats::class);

        $stats = new HorizonStatsDto(
            $horizon->getCurrentProcessesPerQueue(),
            $horizon->getCurrentWorkload(),
            $horizon->getCurrentWorkloadWaitTimes(),
            $horizon->getRecentlyFailedJobsCount(),
            (bool) $horizon->getHorizonStatus(),
            $horizon->getJobsPerMinute(),
            $horizon->getRecentJobsCount(),
            $horizon->getOrphanedProcesses(),
        );

        $monitr->sendHorizonStats($stats);
    }
}
