<?php

namespace Okaufmann\LaravelHorizonMonitr\Monitr;

use Illuminate\Contracts\Support\Arrayable;

class HorizonStatsDto implements Arrayable
{
    protected array $queueProcesses;
    protected array $queueWorkload;
    protected array $waitTimes;
    protected int $recentlyFailed;
    protected bool $horizonRunning;
    protected int $jobsPerMinute;
    protected int $recentJobsCount;
    protected int $orphanedProcesses;

    public function __construct(
        array $queueProcesses,
        array $queueWorkload,
        array $waitTimes,
        int $recentlyFailed,
        bool $horizonRunning,
        int $jobsPerMinute,
        int $recentJobCount,
        int $orphanedProcesses)
    {
        $this->queueProcesses = $queueProcesses;
        $this->queueWorkload = $queueWorkload;
        $this->waitTimes = $waitTimes;
        $this->recentlyFailed = $recentlyFailed;
        $this->horizonRunning = $horizonRunning;
        $this->jobsPerMinute = $jobsPerMinute;
        $this->recentJobsCount = $recentJobCount;
        $this->orphanedProcesses = $orphanedProcesses;
    }

    public function toArray()
    {
        return [
            'queue_processes' => $this->queueProcesses,
            'queue_workload' => $this->queueWorkload,
            'wait_times' => $this->waitTimes,
            'recently_failed' => $this->recentlyFailed,
            'horizon_running' => $this->horizonRunning,
            'jobs_per_minute' => $this->jobsPerMinute,
            'recent_jobs_count' => $this->recentJobsCount,
            'orphaned_processes' => $this->orphanedProcesses,
        ];
    }
}
