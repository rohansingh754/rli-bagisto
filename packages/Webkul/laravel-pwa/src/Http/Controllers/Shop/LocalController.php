<?php

namespace Webkul\PWA\Http\Controllers\Shop;

use Webkul\PWA\Http\Controllers\Controller;

class LocalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {}

    /**
     * To extract the page content and load it in the respective view file
     *
     * @param  string  $urlKey
     * @return \Illuminate\View\View
     */
    public function getTranslations()
    {
        $translations = request()->_translate;
        $data = [];

        foreach ($translations as $translation) {
            $data[$translation] = trans($translation);
        }

        return response()->json([
            'data' => $data,
        ]);
    }
}
