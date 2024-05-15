<?php

use Illuminate\Support\Facades\Route;
use Webkul\Enclaves\Http\Controllers\Admin\Ticket\FaqController;
use Webkul\Enclaves\Http\Controllers\Admin\Theme\ThemeController;
use Webkul\Enclaves\Http\Controllers\Admin\Ticket\TicketsController;
use Webkul\Enclaves\Http\Controllers\Admin\Product\ReadProductUrlController;
use Webkul\Enclaves\Http\Controllers\Admin\Category\ReadCategoryUrlController;

/**
 * Settings routes.
 */
Route::group(['middleware' => ['admin'], 'prefix' => config('app.admin_url')], function () {

    // Over ride route
    Route::controller(ThemeController::class)->group(function () {
        Route::get('settings/themes/edit/{id}', 'edit')->name('admin.settings.themes.edit');
  
        Route::post('edit/{id}', 'update')->name('enclaves.settings.themes.update');
    });

    Route::controller(TicketsController::class)->prefix('inquiries/tickets')->group(function () {
        Route::get('', 'index')->name('enclaves.admin.inquiries.tickets');

        Route::get('view/{id}', 'view')->name('enclaves.admin.inquiries.ticket.view');

        Route::post('', 'store')->name('enclaves.admin.inquiries.ticket.store');

        Route::post('update/{id}', 'update')->name('enclaves.admin.inquiries.ticket.update');

        Route::get('delete/{id}', 'destroy')->name('enclaves.admin.inquiries.ticket.destroy');

        Route::post('mass-delete', 'massDestroy')->name('enclaves.admin.inquiries.ticket.mass-destroy');
    });

    Route::controller(FaqController::class)->prefix('inquiries/faq')->group(function () {
        Route::get('', 'index')->name('enclaves.admin.inquiries.faq');

        Route::post('store', 'store')->name('enclaves.admin.inquiries.faq.store');

        Route::get('edit/{id}', 'edit')->name('enclaves.admin.inquiries.faq.edit');

        Route::post('update', 'update')->name('enclaves.admin.inquiries.faq.update');

        Route::post('delete/{id}', 'destroy')->name('enclaves.admin.inquiries.faq.destroy');
    });

    Route::prefix('product-image-url')->group(function () {
        Route::post('{id}/reading-url', [ReadProductUrlController::class, 'readUrls'])
            ->name('enclaves.admin.product.image.url');
    });

    Route::prefix('category-image-link')->group(function () {
        Route::post('{id}/reading-url', [ReadCategoryUrlController::class, 'readUrl'])
            ->name('enclaves.admin.category.image.url');
    });
});