@php
    $themeAssetsPath = 'themes/enclave-pwa/build/assets/';
@endphp

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="content-language" content="{{ app()->getLocale() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="{{ core()->getConfigData('pwa.settings.general.theme_color') ?? '#0041ff'  }}">
        <meta name="description" content="{{ core()->getConfigData('pwa.settings.seo.seo_description') ?? 'This is a PWA app'  }}" > <!-- this line is to meet the requirment of lighthouse extension. -->

        @if (core()->getConfigData('pwa.settings.seo.seo_author'))
        <meta name="author" content="{{ core()->getConfigData('pwa.settings.seo.seo_author')  }}" >
        @endif

        @if (core()->getConfigData('pwa.settings.seo.seo_keywords'))
        <meta name="keywords" content="{{ core()->getConfigData('pwa.settings.seo.seo_keywords')  }}" >
        @endif

        <link rel="stylesheet" href="{{ asset($themeAssetsPath . 'css/pwa.css?v=' . strtotime("now")) }}">
        <link rel="stylesheet" href="{{ asset($themeAssetsPath . 'css/enclave.css?v=' . strtotime("now")) }}">
        <link rel="manifest" href="{{ asset('manifest.json') }}">
        <link rel="manifest" href="{{ asset('manifest.webmanifest') }}">

        <link rel="icon" sizes="48x48" href="{{ core()->getConfigData('pwa.settings.media.small') ? Storage::url(core()->getConfigData('pwa.settings.media.small')) : asset($themeAssetsPath . 'images/48x48.png') }}" />
        <link rel="icon" sizes="96x96" href="{{ core()->getConfigData('pwa.settings.media.small') ? Storage::url(core()->getConfigData('pwa.settings.media.medium')) : asset($themeAssetsPath . 'images/96x96.png')  }}">
        <link rel="icon" sizes="144x144" href="{{ core()->getConfigData('pwa.settings.media.small') ? Storage::url(core()->getConfigData('pwa.settings.media.large')) : asset($themeAssetsPath . 'images/144x144.png')  }}">
        <link rel="icon" sizes="196x196" href="{{ core()->getConfigData('pwa.settings.media.small') ? Storage::url(core()->getConfigData('pwa.settings.media.extra_large')) : asset($themeAssetsPath . 'images/196x196.png')  }}">

        {{-- icons for IOS devices --}}
        <link rel="apple-touch-icon" sizes="48x48" href="{{ core()->getConfigData('pwa.settings.media.small') ? Storage::url(core()->getConfigData('pwa.settings.media.small')) : asset($themeAssetsPath . 'images/48x48.png')  }}">
        <link rel="apple-touch-icon" sizes="96x96" href="{{ core()->getConfigData('pwa.settings.media.small') ? Storage::url(core()->getConfigData('pwa.settings.media.medium')) : asset($themeAssetsPath . 'images/96x96.png')  }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ core()->getConfigData('pwa.settings.media.small') ? Storage::url(core()->getConfigData('pwa.settings.media.large')) : asset($themeAssetsPath . 'images/144x144.png')  }}">
        <link rel="apple-touch-icon" sizes="196x196" href="{{ core()->getConfigData('pwa.settings.media.small') ? Storage::url(core()->getConfigData('pwa.settings.media.extra_large')) : asset($themeAssetsPath . 'images/196x196.png')  }}">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

        <meta name="apple-mobile-web-app-capable" content="yes">

        <span class="phpdebugbar-text-muted">
        <samp data-depth="1" class="sf-dump-compact">

        {!! view_render_event('bagisto.pwa.layout.head') !!}
        <title>
            {{ core()->getConfigData('pwa.settings.seo.seo_title') ?? 'PWA'  }}
        </title>
    </head>

    <body

        @if (app()->getLocale() == 'ar') class="rtl" dir="rtl" @endif style="scroll-behavior: smooth;"
        >

        {!! view_render_event('bagisto.pwa.layout.body.before') !!}

        <div
            id="app"
            class="font-roboto"
            >
            <app></app>
        </div>
        <script type="text/javascript">
            var appBaseUrl = "{{ config('app.url') }}";
            if (!appBaseUrl.endsWith("/")) {
                appBaseUrl = appBaseUrl + '/';
            }

            window.channel = @json(new \Webkul\PWA\Http\Resources\Core\Channel(core()->getCurrentChannel()));
            window.config = {
                app_short_name: "{{ core()->getConfigData('pwa.settings.general.short_name') }}",
                app_base_url: appBaseUrl,
                url_path: "{{ $urlPath }}",
                prefix: "{{ $urlPath }}" + '/' + "{{ request()->route()->getName() == 'pwa.home' ? 'pwa' : 'mobile' }}",
                currencies: @json(core()->getCurrentChannel()->currencies),
                currentCurrency: @json(core()->getCurrentCurrency()),
                locales: @json(core()->getCurrentChannel()->locales),
                currentLocale: @json(core()->getCurrentLocale()),
                device: @json($device),
                themeAssetsPath: @json(asset($themeAssetsPath)) + '/',
            };
        </script>

        @php
            $clientId = core()->getConfigData('sales.paymentmethods.paypal_smart_button.client_id');
            $acceptedCurrency = core()->getConfigData('sales.paymentmethods.paypal_smart_button.accepted_currencies');
        @endphp

        @if ($clientId && $acceptedCurrency)
            <script src="https://www.paypal.com/sdk/js?client-id={{ $clientId }}&currency={{ $acceptedCurrency }}" data-partner-attribution-id="Bagisto_Cart"></script>
        @endif

        <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/mobilenet" defer></script>
        <script type="text/javascript" src="{{ asset($themeAssetsPath . 'js/app.js?v=' . strtotime("now")) }}"></script>

        @stack('scripts')

        {!! view_render_event('bagisto.pwa.layout.body.after') !!}

        <script>
            if ('serviceWorker' in navigator ) {

                window.addEventListener('load', function() {
                    navigator.serviceWorker.register("{{ asset('service-worker.js') }}")
                        .then(function(registration) {
                            {{-- console.log('ServiceWorker registration successful with scope: ', registration.scope); --}}

                            let deferredPrompt;

                            window.addEventListener('beforeinstallprompt', (e) => {
                                // Stash the event so it can be triggered later.
                                deferredPrompt = e;
                                // Update UI to notify the user they can add to home screen
                            });
                        }, function(err) {
                            console.log('ServiceWorker registration failed: ', err);
                        });
                });
            }
        </script>
    </body>
</html>
