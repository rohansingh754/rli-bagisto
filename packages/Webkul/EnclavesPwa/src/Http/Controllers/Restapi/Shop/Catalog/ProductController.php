<?php

namespace Webkul\EnclavePwa\Http\Controllers\Restapi\Shop\Catalog;

use Illuminate\Http\Request;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\RestApi\Http\Controllers\V1\Shop\Catalog\ProductController as BaseProductController;
use Webkul\EnclavePwa\Http\Resources\Catalog\ProductResource;

class ProductController extends BaseProductController
{
	/**
	 * Create a controller instance.
	 *
	 * @return void
	 */
	public function __construct(
		protected ProductRepository $productRepository,
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
	public function allResources(Request $request)
	{
		$products = $this->getRepositoryInstance()
			->getAll(array_merge(request()->query(), [
				'channel_id'           => core()->getCurrentChannel()->id,
				'status'               => 1,
				'visible_individually' => 1,
			]));

		return $this->getResourceCollection($products);
	}
}
