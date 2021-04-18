<?php

namespace Okaufmann\LaravelHorizonMonitr;

use Okaufmann\LaravelHorizonMonitr\Horizon\StatsCollector;
use Okaufmann\LaravelHorizonMonitr\Monitr\Client as Monitr;
use Okaufmann\LaravelHorizonMonitr\Monitr\HorizonStatsDto;

class HorizonMonitr
{
    private Monitr $monitr;

    private StatsCollector $horizon;

    public function __construct(Monitr $monitr, StatsCollector $horizon)
    {
        $this->monitr = $monitr;
        $this->horizon = $horizon;
    }

    public function collectAndSendStats()
    {
        $stats = new HorizonStatsDto(
            $this->horizon->getCurrentProcessesPerQueue(),
            $this->horizon->getCurrentWorkload(),
            $this->horizon->getCurrentWorkloadWaitTimes(),
            $this->horizon->queueWithMaximumRuntime(),
            $this->horizon->queueWithMaximumThroughput(),
            $this->horizon->getRecentlyFailedJobsCount(),
            $this->horizon->getHorizonStatus() === 1,
            $this->horizon->getJobsPerMinute(),
            $this->horizon->getRecentJobsCount(),
            config('horizon.trim'),
            $this->horizon->getOrphanedProcesses(),
            gethostname(),
            [
                'redis_prefix' => config('database.redis.options.prefix'),
                'redis_db' => config('database.redis.default.database'),
                'redis_cache_db' => config('database.redis.cache.database'),
            ],
            route('horizon.index'),
        );

        $this->monitr->sendHorizonStats($stats);
    }
}
