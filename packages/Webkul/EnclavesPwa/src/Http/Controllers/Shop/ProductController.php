<?php

namespace Webkul\EnclavePwa\Http\Controllers\Shop;

use Webkul\Product\Repositories\ProductRepository;
use Webkul\EnclavePwa\Http\Controllers\Controller;
use Webkul\EnclavePwa\Http\Controllers\Restapi\Shop\Catalog\ProductController as APIProductController;
use Webkul\EnclavePwa\Http\Resources\Catalog\ProductResource;

class ProductController extends Controller
{
    /**
     * Controller instance
     *
     * @param  Webkul\Product\Repositories\ProductReviewRepository  $reviewRepository
     */
    public function __construct(
        protected ProductRepository $productRepository,
        protected APIProductController $aPIProductController
    ) {}

    /**
     * Resource class name.
     */
    public function resource(): string
    {
        return ProductResource::class;
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
}
