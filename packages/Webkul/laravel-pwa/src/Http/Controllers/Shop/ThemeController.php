<?php

namespace Webkul\PWA\Http\Controllers\Shop;

use Webkul\PWA\Http\Controllers\Controller;
use Webkul\Theme\Repositories\ThemeCustomizationRepository;
use Webkul\Blog\Http\Controllers\Shop\BlogController;

class ThemeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  Webkul\Theme\Repositories\ThemeCustomizationRepository  $themeCustomizationRepository
     * @return void
     */
    public function __construct(
        protected ThemeCustomizationRepository $themeCustomizationRepository,
        protected BlogController $blogController
    ) {}

    /**
     * Get carousel images.
     */
    public function sliders()
    {
        $sliders = $this->themeCustomizationRepository->orderBy('sort_order')->findOneWhere([
            'status'     => 1,
            'channel_id' => core()->getCurrentChannel()->id,
            'type'       => 'image_carousel',
        ]);

        return $sliders->options;
    }

    /**
     * Get carousel images.
     */
    public function newAndUpadteList()
    {
        $list = $this->blogController->blogFrontEnd();

        return $list;
    }
}
