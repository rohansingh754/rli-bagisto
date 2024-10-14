<?php

namespace Webkul\EnclavePwa\Http\Controllers\Shop;

use Webkul\CMS\Repositories\PageRepository;
use Webkul\Marketing\Repositories\URLRewriteRepository;
use Webkul\EnclavePwa\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected PageRepository $pageRepository,
        protected URLRewriteRepository $urlRewriteRepository
    ) {}

    /**
     * To extract the page content and load it in the respective view file
     *
     * @param  string  $urlKey
     * @return \Illuminate\View\View
     */
    public function getCmsPage($urlKey)
    {
        $page = $this->pageRepository->findByUrlKey($urlKey);

        return response()->json([
            'data'    => $page,
        ]);
    }
}
