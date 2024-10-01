<?php

namespace Webkul\PWA\Http\Controllers\Shop;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Webkul\Blog\Http\Controllers\Controller;
use Webkul\Blog\Http\Resources\BlogResource;

class BlogController extends Controller
{
    /**
     * Using const variable for status
     */
    const STATUS = 1;

    /**
     * Product listings.
     */
    public function blogFrontEnd(): JsonResource
    {
        $blogs = $this->blogRepository->where('status', 1);

        if (! empty(request('limit'))) {
            $limit = (int)request('limit');

            $blogs->skip(0)->take($limit);
        }

        if (! empty(request('id'))) {
            $blogs = $blogs->whereNotIn('id', [(int)request('id')]);
        }

        return BlogResource::collection($blogs->get());
    }

    /**
     * Get Blog details.
     */
    public function blogDetails($id): JsonResource
    {
        $blog = $this->blogRepository
            ->where('id', $id)
            ->get();

        return BlogResource::collection($blog);
    }
}
