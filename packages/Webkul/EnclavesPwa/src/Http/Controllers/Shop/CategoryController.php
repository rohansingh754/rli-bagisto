<?php

namespace Webkul\EnclavePwa\Http\Controllers\Shop;

use Webkul\Product\Repositories\ProductRepository;
use Webkul\Enclaves\Repositories\ProductRepository as EnclaveProductRepository;
use Webkul\EnclavePwa\Http\Controllers\Controller;
use Webkul\EnclavePwa\Http\Controllers\Restapi\Shop\Catalog\ProductController as APIProductController;
use Webkul\EnclavePwa\Http\Resources\Catalog\ProductResource;
use Webkul\Category\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    /**
     * Controller instance
     *
     * @param  Webkul\Product\Repositories\ProductReviewRepository  $reviewRepository
     */
    public function __construct(
        protected ProductRepository $productRepository,
        protected EnclaveProductRepository $enclaveProductRepository,
        protected APIProductController $aPIProductController,
        protected CategoryRepository $categoryRepository,
    ) {}

    /**
     * Resource class name.
     */
    public function resource(): string
    {
        return ProductResource::class;
    }

    /**
     * Returns a listing of the resource.
     */
    public function allResources()
    {
        $products = $this->enclaveProductRepository
            ->getAll(array_merge(request()->query(), [
                'channel_id'           => core()->getCurrentChannel()->id,
                'status'               => 1,
                'visible_individually' => 1,
            ]));

        return response()->json([
            'data' => ProductResource::collection($products),
        ]);
    }

    public function getCompareAbleProducts()
    {
        $products = $this->productRepository
            ->getAll(array_merge(request()->query(), [
                'channel_id'           => core()->getCurrentChannel()->id,
                'status'               => 1,
                'visible_individually' => 1,

            ]))
            ->whereIn('id', request()->query('ids'));

        return response()->json([
            'data' => ProductResource::collection($products),
        ]);
    }

    /**
     * Get all categories.
     */
    public function getAll()
    {
        $categories = $this->categoryRepository->whereIn('id', request()->ids)->get();

        return response()->json([
            'data' => $categories,
        ]);
    }
}
