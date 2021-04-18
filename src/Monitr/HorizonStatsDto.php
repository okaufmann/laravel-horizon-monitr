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
    private ?string $maxRuntimeQueue;
    private ?string $maxThroughputQueue;
    private array $trimTimes;
    private string $horizonUrl;

    public function __construct(
        array $queueProcesses,
        array $queueWorkload,
        array $waitTimes,
        ?string $maxRuntimeQueue,
        ?string $maxThroughputQueue,
        int $recentlyFailed,
        bool $horizonRunning,
        int $jobsPerMinute,
        int $recentJobCount,
        array $trimTimes,
        int $orphanedProcesses,
        string $hostname,
        array $queueConfig,
        string $horizonUrl)
    {
        $this->queueProcesses = $queueProcesses;
        $this->queueWorkload = $queueWorkload;
        $this->waitTimes = $waitTimes;
        $this->maxRuntimeQueue = $maxRuntimeQueue;
        $this->maxThroughputQueue = $maxThroughputQueue;
        $this->recentlyFailed = $recentlyFailed;
        $this->horizonRunning = $horizonRunning;
        $this->jobsPerMinute = $jobsPerMinute;
        $this->recentJobsCount = $recentJobCount;
        $this->orphanedProcesses = $orphanedProcesses;
        $this->hostname = $hostname;
        $this->queueConfig = $queueConfig;

        $this->trimTimes = $trimTimes;
        $this->horizonUrl = $horizonUrl;
    }

    public function toArray()
    {
        return [
            'queue_processes' => $this->queueProcesses,
            'queue_workload' => $this->queueWorkload,
            'wait_times' => $this->waitTimes,
            'max_runtime_queue' => $this->maxRuntimeQueue,
            'max_throughput_queue' => $this->maxThroughputQueue,
            'recently_failed' => $this->recentlyFailed,
            'horizon_running' => $this->horizonRunning,
            'jobs_per_minute' => $this->jobsPerMinute,
            'recent_jobs_count' => $this->recentJobsCount,
            'trim_times' => $this->trimTimes,
            'orphaned_processes' => $this->orphanedProcesses,
            'hostname' => $this->hostname,
            'queue_config' => $this->queueConfig,
            'horizon_url' => $this->horizonUrl,
        ];
    }
}
