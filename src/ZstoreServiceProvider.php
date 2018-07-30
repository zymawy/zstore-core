<?php

/*
 * This file is part of the Zstore Shop package.
 *
 * (c) Gustavo Ocanto <gustavoocanto@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zstore;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ZstoreServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerRoutes();
        $this->registerResources();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerServices();
        $this->registerProviders();
        $this->registerServicesAliases();
    }

    /**
     * Register the Zstore resources.
     *
     * @return void
     */
    protected function registerResources()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'zstore');
    }

    /**
     * Register the Zstore routes.
     *
     * @return void
     */
    protected function registerRoutes()
    {
        Route::namespace('Zstore')->middleware('web')->group(function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        });
    }

    /**
     * Register Zstore services in the container.
     *
     * @return void
     */
    protected function registerServices()
    {
        foreach (Zstore::bindings() as $key => $value) {
            is_numeric($key)
                ? $this->app->singleton($value)
                : $this->app->singleton($key, $value);
        }
    }

    /**
     * Register Zstore services aliases in the container.
     *
     * @return void
     */
    protected function registerServicesAliases()
    {
        foreach (Zstore::alias() as $key => $value) {
            $this->app->alias($value, $key);
        }
    }

    /**
     * Register Zstore services providers.
     *
     * @return void
     */
    protected function registerProviders()
    {
        foreach (Zstore::providers() as $provider) {
            $this->app->register($provider);
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [Zstore::class];
    }
}
