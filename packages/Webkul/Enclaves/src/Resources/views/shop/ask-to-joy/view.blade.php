<!-- SEO Meta Content -->
@push('meta')
    @if (core()->getConfigData('catalog.rich_snippets.categories.enable'))
    @endif
@endPush

<x-shop::layouts>
    <!-- Page Title -->
    <x-slot:title>
        {{ 'All Products' }}
    </x-slot>

    <!-- Category Vue Component -->
    <v-category></v-category>

    @pushOnce('scripts')
        <script
            type="text/x-template"
            id="v-category-template"
            >

        </script>

        <script type="module">
            app.component('v-category', {
                template: '#v-category-template',

                data() {
                    return {
                        isMobile: window.innerWidth <= 767,

                        isLoading: true,

                        isMoreLoading: false,

                        isDrawerActive: {
                            toolbar: false,

                            filter: false,
                        },

                        filters: {
                            toolbar: {},

                            filter: {},
                        },

                        products: [],

                        links: {},

                        isCustomer: '{{ auth()->guard("customer")->check() }}',
                    }
                },
            });
        </script>
    @endPushOnce
</x-shop::layouts>
