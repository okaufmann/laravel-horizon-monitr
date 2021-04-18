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
            $horizon->getHorizonStatus() === 1,
            $horizon->getJobsPerMinute(),
            $horizon->getRecentJobsCount(),
            config('horizon.trim.recent'),
            $horizon->getOrphanedProcesses(),
            gethostname(),
            [
                'redis_prefix' => config('database.redis.options.prefix'),
                'redis_db' => config('database.redis.default.database'),
                'redis_cache_db' => config('database.redis.cache.database'),
            ]
        );

        $monitr->sendHorizonStats($stats);
    }
}
