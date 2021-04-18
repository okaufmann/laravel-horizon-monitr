<?php

namespace Okaufmann\LaravelHorizonMonitr;

use Okaufmann\LaravelHorizonMonitr\Commands\LaravelHorizonMonitrCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelHorizonMonitrServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-horizon-monitr')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-horizon-monitr_table')
            ->hasCommand(LaravelHorizonMonitrCommand::class);
    }
}
