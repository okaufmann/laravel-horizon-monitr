<?php

namespace Okaufmann\LaravelHorizonMonitr;

use Okaufmann\LaravelHorizonMonitr\Commands\SendHorizonStats;
use Okaufmann\LaravelHorizonMonitr\Monitr\Client;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelHorizonMonitrServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-horizon-monitr')
            ->hasConfigFile('laravel-horizon-monitr')
            ->hasCommand(SendHorizonStats::class);
    }

    public function packageRegistered()
    {
        $this->app->singleton(Client::class, function () {
            return new Client(config('laravel-horizon-monitr.monitr'));
        });
    }
}
