<?php

namespace Webkul\Enclaves\Http\Controllers\Shop\EnclaveMenu;

use Webkul\Enclaves\Http\Controllers\Controller;
use Webkul\Enclaves\Http\Controllers\Shop\Category\CategoryController;

class EnclaveMenuController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected CategoryController $categoryController,
    ) {}

    /**
     * Get all categories.
     */
    public function menuItems()
    {
        $menuItems = [
            [
                'label' => 'Homepage',
                'type'  => 'link',
                'url'   => route('shop.home.index'),
                'visible' => true,
                'submenu' => []
            ],
            [
                'label' => 'About Us',
                'type'  => 'link',
                'url'   => route('shop.cms.page', 'about-us'),
                'visible' => true,
                'submenu' => []
            ],
            [
                'label' => 'Ask Joy',
                'type'  => 'button',
                'modal' => 'ask-joy-modal',
                'visible' => true,
                'submenu' => []
            ],
            [
                'label' => 'Our Brands',
                'type'  => 'link',
                'url'   => './our-brand',
                'visible' => true,
                'submenu' => $this->productCategories(),
            ],
            [
                'label' => 'Partner with Us',
                'type'  => 'link',
                'url'   => route('shop.partners.index'),
                'visible' => true,
                'submenu' => []
            ],
            [
                'label' => 'Announcements',
                'type'  => 'link',
                'url'   => route('shop.article.index'),
                'visible' => true,
                'submenu' => []
            ],
            [
                'label' => 'Contact Us',
                'type'  => 'link',
                'url'   => route('shop.cms.page', 'contact-us'),
                'visible' => true,
                'submenu' => []
            ]
        ];

        return response()->json([
            'data' => $menuItems,
        ]);
    }

    public function productCategories()
    {
        $categories = [];

        foreach ($this->categoryController->index() as $category) {
            $categories[] = [
                'label'   => $category->name,
                'type'    => 'category',
                'url'     => $category->url,
                'visible' => true
            ];
        }

        return $categories;
    }
}
