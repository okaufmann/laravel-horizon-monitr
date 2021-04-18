<?php

namespace Okaufmann\LaravelHorizonMonitr;

use Laravel\Horizon\Contracts\JobRepository;
use Laravel\Horizon\Contracts\MasterSupervisorRepository;
use Laravel\Horizon\Contracts\MetricsRepository;
use Laravel\Horizon\Contracts\WorkloadRepository;
use Laravel\Horizon\ProcessInspector;

class HorizonStats
{
    public function getCurrentProcessesPerQueue(): array
    {
        $workloadRepository = app(WorkloadRepository::class);
        $workloads = collect($workloadRepository->get())->sortBy('name')->values();

        $workers = [];
        foreach ($workloads as $workload) {
            $workers[$workload['name']] = $workload['processes'];
        }

        return $workers;
    }

    public function getCurrentWorkload(): array
    {
        $workloadRepository = app(WorkloadRepository::class);
        $workloads = collect($workloadRepository->get())->sortBy('name')->values();

        $workers = [];
        foreach ($workloads as $workload) {
            $workers[$workload['name']] = $workload['length'];
        }

        return $workers;
    }

    public function getCurrentWorkloadWaitTimes(): array
    {
        $workloadRepository = app(WorkloadRepository::class);
        $workloads = collect($workloadRepository->get())->sortBy('name')->values();

        $workers = [];
        foreach ($workloads as $workload) {
            $workers[$workload['name']] = $workload['wait'];
        }

        return $workers;
    }

    public function getOrphanedProcesses(): int
    {
        $inspector = app(ProcessInspector::class);

        return count($inspector->orphaned());
    }

    public function getHorizonStatus(): int
    {
        $status = -1;
        if ($masters = app(MasterSupervisorRepository::class)->all()) {
            $status = collect($masters)->contains(function ($master) {
                return $master->status === 'paused';
            }) ? 0 : 1;
        }

        return $status;
    }

    public function getRecentlyFailedJobsCount(): int
    {
        return app(JobRepository::class)->countRecentlyFailed();
    }

    public function getJobsPerMinute(): int
    {
        return app(MetricsRepository::class)->jobsProcessedPerMinute();
    }

    public function getRecentJobsCount(): int
    {
        return app(JobRepository::class)->countRecent();
    }

    public function queueWithMaximumRuntime()
    {
        return app(MetricsRepository::class)->queueWithMaximumRuntime();
    }

    public function queueWithMaximumThroughput()
    {
        return app(MetricsRepository::class)->queueWithMaximumThroughput();
    }
}
