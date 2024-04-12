<?php

namespace Webkul\Enclaves\Http\Middleware;

use Closure;

class Theme
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $themes = app('themes');
        $channel = core()->getCurrentChannel();

        if (
            $channel
            && $channelThemeCode = $channel->theme
        ) {
            if ($themes->exists($channelThemeCode)) {
                $themes->set($channelThemeCode);
            } else {
                $themes->set(config('themes.default'));
            }
        } else {
            $themes->set(config('themes.default'));
        }

        return $next($request);
    }
}
