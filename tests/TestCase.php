<?php

namespace Okaufmann\LaravelHorizonMonitr\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Okaufmann\LaravelHorizonMonitr\LaravelHorizonMonitrServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Spatie\\LaravelHorizonMonitr\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelHorizonMonitrServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        /*
        include_once __DIR__.'/../database/migrations/create_laravel-horizon-monitr_table.php.stub';
        (new \CreatePackageTable())->up();
        */
    }
}
