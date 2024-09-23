<?php

namespace Webkul\PWA\Providers;

use Illuminate\Support\ServiceProvider;
use Webkul\RestApi\Http\Controllers\V1\Shop\Catalog\ProductController as BaseProductController;
use Webkul\PWA\Http\Controllers\Restapi\Shop\Catalog\ProductController;
use Webkul\RestApi\Http\Controllers\V1\Shop\Customer\AuthController as BaseAuthController;
use Webkul\PWA\Http\Controllers\Restapi\Shop\Customer\AuthController;

class PWAServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');

        $this->app->register(EventServiceProvider::class);

        $this->app->register(ModuleServiceProvider::class);

        $this->app->bind(BaseProductController::class, ProductController::class);
        $this->app->bind(BaseAuthController::class, AuthController::class);

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'pwa');

        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'pwa');

        $this->publishes([
            __DIR__ . '/../../publishable/pwa'      => public_path(),
            __DIR__ . '/../../publishable/assets'   => public_path('themes/pwa/default/build/assets'),
        ], 'public');

        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/admin-menu.php',
            'menu.admin'
        );
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConfig();
    }

    /**
     * Register package config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/system.php',
            'core'
        );
    }
}
