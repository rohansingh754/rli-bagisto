<?php

use Illuminate\Support\Facades\Route;

use Webkul\EnclavePwa\Http\Controllers\Shop\PageController;
use Webkul\EnclavePwa\Http\Controllers\Shop\BlogController;
use Webkul\EnclavePwa\Http\Controllers\Shop\ProductController;
use Webkul\EnclavePwa\Http\Controllers\Shop\EnclaveSupport;
use Webkul\EnclavePwa\Http\Controllers\Shop\Customer;

Route::group(['middleware' => ['locale', 'theme', 'currency']], function () {
    Route::group(['prefix' => 'api/pwa'], function () {

        Route::group(['middleware' => ['auth:sanctum', 'sanctum.customer']], function () {

            Route::controller(EnclaveSupport::class)->group(function () {
                Route::get('customer/support/reasons', 'getTicketReasons');

                Route::post('customer/support/ticket/store', 'store');
            });

            Route::controller(Customer::class)->group(function () {
                Route::group(['prefix' => 'customer'], function () {
                    Route::get('/attributes', 'getCustomerAttributes');

                    Route::post('/update-password', 'updatePassword');
                });
            });
        });

        /**
         * product routes.
         */
        Route::controller(ProductController::class)->prefix('products')->group(function () {
            Route::get('compare', 'getCompareAbleProducts');
        });

        Route::get('page/{slug}', [PageController::class, 'getCmsPage']);

        Route::controller(BlogController::class)->group(function () {
            Route::get('news-list', 'blogFrontEnd');

            Route::get('news/{id}', 'blogDetails');
        });
    });
});
