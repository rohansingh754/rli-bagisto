<?php

namespace Webkul\EnclavePwa\Http\Controllers;

use WhichBrowser\Parser;

class SinglePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! core()->getConfigData('pwa.settings.general.status')) {
            session()->flash('warning', trans('pwa::app.shop.home.enable-pwa-status'));

            return redirect()->route('shop.home.index');
        }

        $parsedUrl = parse_url(config('app.url'));

        $urlPath = isset($parsedUrl['path']) ? $parsedUrl['path'] : '';

        $result = new Parser(request()->header('User-Agent'));
        $device = $result->device;

        $view = 'pwa::shop.default.master';

        $channel = core()->getCurrentChannel();

        if ($channel->theme === 'enclaves') {
            $view = 'enclave-pwa::shop.enclaves.master';
        }

        return view($view, compact('urlPath', 'device'));
    }
}
