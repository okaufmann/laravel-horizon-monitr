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
    protected int $recentTime;
    protected int $orphanedProcesses;
    protected string $hostname;
    protected array $queueConfig;

    public function __construct(
        array $queueProcesses,
        array $queueWorkload,
        array $waitTimes,
        int $recentlyFailed,
        bool $horizonRunning,
        int $jobsPerMinute,
        int $recentJobCount,
        int $recentTime,
        int $orphanedProcesses,
        string $hostname,
        array $queueConfig)
    {
        $this->queueProcesses = $queueProcesses;
        $this->queueWorkload = $queueWorkload;
        $this->waitTimes = $waitTimes;
        $this->recentlyFailed = $recentlyFailed;
        $this->horizonRunning = $horizonRunning;
        $this->jobsPerMinute = $jobsPerMinute;
        $this->recentJobsCount = $recentJobCount;
        $this->recentTime = $recentTime;
        $this->orphanedProcesses = $orphanedProcesses;
        $this->hostname = $hostname;
        $this->queueConfig = $queueConfig;
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
            'recent_time' => $this->recentTime,
            'orphaned_processes' => $this->orphanedProcesses,
            'hostname' => $this->hostname,
            'queue_config' => $this->queueConfig,
        ];
    }
}
