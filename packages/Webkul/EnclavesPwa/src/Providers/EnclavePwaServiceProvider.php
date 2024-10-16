<?php

namespace Webkul\EnclavePwa\Providers;

use Illuminate\Support\ServiceProvider;
use Webkul\RestApi\Http\Controllers\V1\Shop\Catalog\ProductController as BaseProductController;
use Webkul\EnclavePwa\Http\Controllers\Restapi\Shop\Catalog\ProductController;
use Webkul\RestApi\Http\Controllers\V1\Shop\Customer\AuthController as BaseAuthController;
use Webkul\EnclavePwa\Http\Controllers\Restapi\Shop\Customer\AuthController;
use Webkul\PWA\Http\Controllers\SinglePageController as BaseSinglePageController;
use Webkul\EnclavePwa\Http\Controllers\SinglePageController;

class EnclavePwaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');

        if (core()->getConfigData('pwa.settings.general.status')) {
            $this->app->bind(BaseProductController::class, ProductController::class);
            $this->app->bind(BaseAuthController::class, AuthController::class);
            $this->app->bind(BaseSinglePageController::class, SinglePageController::class);
        }

        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'enclave-pwa');

        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'enclave-pwa');

        $this->publishes([
            __DIR__ . '/../../publishable/assets'   => public_path('themes/enclave-pwa/build/assets'),
        ], 'public');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register() {}

    /**
     * Register package config.
     *
     * @return void
     */
    protected function registerConfig() {}
}
