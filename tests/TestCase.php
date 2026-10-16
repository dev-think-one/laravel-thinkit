<?php

namespace ThinKit\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;

class TestCase extends \Orchestra\Testbench\TestCase
{
    use RefreshDatabase;

    protected function getPackageProviders($app)
    {
        return [
            \ThinKit\ServiceProvider::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);

        // Register migrations so RefreshDatabase runs them,
        // testbench 9+ executes "migrate:fresh" what drops tables created in defineDatabaseMigrations().
        $app->afterResolving('migrator', function ($migrator) use ($app) {
            $migrator->path($app->basePath('migrations'));
            $migrator->path(__DIR__.'/Fixtures/migrations');
        });

        // $app['config']->set('thinkit.some_key', 'some_value');
    }
}
