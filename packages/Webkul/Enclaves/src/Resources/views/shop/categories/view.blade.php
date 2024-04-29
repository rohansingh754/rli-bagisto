<!-- SEO Meta Content -->
@push('meta')
    <meta name="description" content="{{ trim($category->meta_description) != "" ? $category->meta_description : \Illuminate\Support\Str::limit(strip_tags($category->description), 120, '') }}"/>

    <meta name="keywords" content="{{ $category->meta_keywords }}"/>

    @if (core()->getConfigData('catalog.rich_snippets.categories.enable'))
        <script type="application/ld+json">
            {!! app('Webkul\Product\Helpers\SEO')->getCategoryJsonLd($category) !!}
        </script>
    @endif
@endPush

<x-shop::layouts>
    <!-- Page Title -->
    <x-slot:title>
        {{ trim($category->meta_title) != "" ? $category->meta_title : $category->name }}
    </x-slot>

    @if (in_array($category->display_mode, [null, 'description_only', 'products_and_description']))
        @if ($category->description)

            <div class="container px-[60px] max-lg:px-[30px]">
                <div class="mt-[40px] flex flex-wrap items-start gap-[40px] max-lg:gap-[20px]">
                    @if ($category->banner_path)
                        <img
                            class="max-h-[172px] w-full max-w-[344px]"
                            src="{{ $category->banner_url }}"
                            alt="{{ $category->name }}"
                            width="344"
                            height="172"
                        >
                    @endif
                    <div class="flex-1">
                        <x-shop::layouts.read-more-smooth
                            text="{!! $category->description !!}"
                            limit=700
                        >
                        </x-shop::layouts.read-more-smooth>
                    </div>
                </div>

                </p>
            </div>
        @endif
    @endif

    @if (in_array($category->display_mode, [null, 'products_only', 'products_and_description']))
        <!-- Category Vue Component -->
        <v-category>
            <!-- Category Shimmer Effect -->
            <x-shop::shimmer.categories.view/>
        </v-category>
    @endif

    @pushOnce('scripts')
        <script 
            type="text/x-template" 
            id="v-category-template"
            >
            <div class="container px-[60px] max-lg:px-[30px]">
                <div class="mt-[40px] flex items-start gap-[40px] max-lg:gap-[20px]">
                    <!-- Product Listing Filters -->
                    @include('shop::categories.filters')

                    <!-- Product Listing Container -->
                    <div class="flex-1">
                        <!-- Desktop Product Listing Toolbar -->
                        <div class="max-md:hidden">
                            @include('shop::categories.toolbar')
                        </div>

                        <!-- Product List Card Container -->
                        <div v-if="filters.toolbar.mode === 'list'" class="mt-8 grid grid-cols-1 gap-6">
                            <!-- Product Card Shimmer Effect -->
                            <template v-if="isLoading">
                                <x-shop::shimmer.products.cards.list count="12"></x-shop::shimmer.products.cards.list>
                            </template>

                            <!-- Product Card Listing -->
                            <template v-else>
                                <template v-if="products.length">
                                    <div
                                        v-for="product in products"
                                        class="relative flex max-w-max grid-cols-2 gap-4 overflow-hidden rounded max-sm:flex-wrap"
                                        >

                                        <div class="group relative max-h-[289px] min-w-[280px] max-w-[350px] overflow-hidden rounded-[20px]">
                                            <x-shop::media.images.lazy
                                                @click="redirectToProduct(product)"
                                                class="cursor-pointer rounded-sm bg-[#F5F5F5] transition-all duration-300 group-hover:scale-105"
                                                ::src="product.base_image.medium_image_url"
                                            ></x-shop::media.images.lazy>

                                            <div class="action-items bg-black"> 
                                                <p
                                                    class="absolute left-[20px] top-[20px] inline-block rounded-[44px] bg-[#E51A1A] px-[10px] text-[14px] text-white"
                                                    v-if="product.on_sale"
                                                >
                                                    @lang('shop::app.components.products.card.sale')
                                                </p>

                                                <p
                                                    class="absolute left-[20px] top-[20px] inline-block rounded-[44px] bg-navyBlue px-[10px] text-[14px] text-white"
                                                    v-else-if="product.is_new"
                                                >
                                                    @lang('shop::app.components.products.card.new')
                                                </p>
                                            </div>
                                        </div>

                                        <div class="relative grid w-full content-start gap-2.5">
                                            <div class="flex gap-[16px]">
                                                <div 
                                                    class="font-popins cursor-pointer pr-[30px] text-[16px] font-bold" 
                                                    v-text="product.name"
                                                    @click="redirectToProduct(product)"
                                                >
                                                </div>

                                                <div 
                                                    class="absolute right-[0px] cursor-pointer text-2xl"
                                                    :class="product.is_wishlist ? 'icon-heart-fill' : 'icon-heart'"
                                                    role="button"
                                                    tabindex="0"
                                                    aria-label="@lang('shop::app.components.products.card.add-to-wishlist')"
                                                    @click="addToWishlist(product.id)"
                                                >
                                                </div>
                                            </div>

                                            <div class="grid flex-wrap items-center justify-between gap-5 max-425:grid">
                                                <div class="grid gap-[12px]">

                                                    <p class="font-popins text-[20px] font-medium" v-html="product.price_html"></p>

                                                    <p class="font-popins text-[16px] font-medium text-[#A0A0A0]">
                                                        @lang('enclaves::app.shop.customers.total-contract-price')
                                                    </p>
                                                </div>

                                                <p class="text-[14px] text-[#6E6E6E]" v-if="! product.avg_ratings">
                                                    @lang('shop::app.components.products.card.review-description')
                                                </p>
                                            
                                                <p v-else class="text-[14px] text-[#6E6E6E]">
                                                    <x-shop::products.star-rating 
                                                        ::value="product && product.avg_ratings ? product.avg_ratings : 0"
                                                        :is-editable=false
                                                    >
                                                    </x-shop::products.star-rating>
                                                </p>

                                                <button
                                                    @click="redirectToProduct(product)"
                                                    class="text-nowrap rounded-[20px] border-[2px] border-[#CC035C] bg-white p-[5px] font-semibold text-[#CC035C]"
                                                >
                                                    @lang('enclaves::app.shop.customers.choose-unit')
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </template>

                                <!-- Empty Products Container -->
                                <template v-else>
                                    <div class="m-auto grid h-[476px] w-[100%] place-content-center items-center justify-items-center text-center">
                                        <img 
                                            src="{{ bagisto_asset('images/thank-you.png') }}"
                                            alt="placeholder"
                                        />
                                
                                        <p class="text-[20px]">
                                            @lang('shop::app.categories.view.empty')
                                        </p>
                                    </div>
                                </template>
                            </template>
                        </div>

                        <!-- Product Grid Card Container -->
                        <div v-else>
                            <!-- Product Card Shimmer Effect -->
                            <template v-if="isLoading">
                                <x-shop::shimmer.products.cards.grid count="12"></x-shop::shimmer.products.cards.grid>
                            </template>

                            <!-- Product Card Listing -->
                            <template v-else>
                                <template v-if="products.length">
                                    <div class="max-1060:grid-cols-2 mt-[30px] grid grid-cols-3 gap-8 max-sm:mt-[20px] max-sm:grid-cols-1 max-sm:justify-items-center">
                                        <div
                                            v-for="product in products"
                                            class="relative grid max-w-[350px] gap-2.5 max-sm:grid-cols-1"
                                            >
                                            <div class="group relative max-h-[289px] max-w-[350px] overflow-hidden rounded-[20px]">
                                                <x-shop::media.images.lazy
                                                    @click="redirectToProduct(product)"
                                                    class="cursor-pointer rounded-sm bg-[#F5F5F5] transition-all duration-300 group-hover:scale-105"
                                                    ::src="product.base_image.medium_image_url"
                                                ></x-shop::media.images.lazy>

                                                <div class="action-items bg-black"> 
                                                    <p
                                                        class="absolute left-[20px] top-[20px] inline-block rounded-[44px] bg-[#E51A1A] px-[10px] text-[14px] text-white"
                                                        v-if="product.on_sale"
                                                    >
                                                        @lang('shop::app.components.products.card.sale')
                                                    </p>

                                                    <p
                                                        class="absolute left-[20px] top-[20px] inline-block rounded-[44px] bg-navyBlue px-[10px] text-[14px] text-white"
                                                        v-else-if="product.is_new"
                                                    >
                                                        @lang('shop::app.components.products.card.new')
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="relative grid content-start gap-4">
                                                <div class="flex h-[50px] gap-[16px]">
                                                    <p 
                                                        class="font-popins cursor-pointer pr-[30px] text-[16px] font-bold" 
                                                        v-text="product.name"
                                                        @click="redirectToProduct(product)"
                                                    ></p>
                                                
                                                    <span 
                                                        class="absolute right-[10px] cursor-pointer text-2xl"
                                                        :class="product.is_wishlist ? 'icon-heart-fill' : 'icon-heart'"
                                                        role="button"
                                                        tabindex="0"
                                                        aria-label="@lang('shop::app.components.products.card.add-to-wishlist')"
                                                        @click="addToWishlist(product.id)"
                                                    >
                                                    </span>
                                                </div>

                                                <div class="justify-right grid grid-cols-2 items-center max-425:grid">
                                                    <div>
                                                        <div 
                                                            class="font-popins text-wrap text-[15px] font-medium" 
                                                            v-html="product.price_html">
                                                        </div>

                                                        <p class="font-popins text-[11px] font-medium text-[#A0A0A0]">
                                                            @lang('enclaves::app.shop.customers.total-contract-price')
                                                        </p>
                                                    </div>

                                                    <button
                                                        @click="redirectToProduct(product)"
                                                        class="text-nowrap rounded-[20px] border-[2px] border-[#CC035C] bg-white p-[5px] font-semibold text-[#CC035C]"
                                                    >
                                                        @lang('enclaves::app.shop.customers.choose-unit')
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>

                                <!-- Empty Products Container -->
                                <template v-else>
                                    <div class="m-auto grid h-[476px] w-[100%] place-content-center items-center justify-items-center text-center">
                                        <img 
                                            src="{{ bagisto_asset('images/thank-you.png') }}"
                                            alt="placeholder"
                                        />
                                        
                                        <p class="text-[20px]">
                                            @lang('shop::app.categories.view.empty')
                                        </p>
                                    </div>
                                </template>
                            </template>
                        </div>

                        <!-- Load More Button -->
                        <div 
                            class="row mt-12 text-center" 
                            v-if="links.next"
                        >
                            <button
                                class="rounded-[20px] bg-[#CC035C] px-[25px] py-[10px] text-white"
                                @click="loadMoreProducts"
                            >
                            @lang('shop::app.categories.view.load-more')
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </script>

        <script type="module">
            app.component('v-category', {
                template: '#v-category-template',

                data() {
                    return {
                        isMobile: window.innerWidth <= 767,

                        isLoading: true,

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

                computed: {
                    queryParams() {
                        let queryParams = Object.assign({}, this.filters.filter, this.filters.toolbar);

                        return this.removeJsonEmptyValues(queryParams);
                    },

                    queryString() {
                        return this.jsonToQueryString(this.queryParams);
                    },
                },

                watch: {
                    queryParams() {
                        this.getProducts();
                    },

                    queryString() {
                        window.history.pushState({}, '', '?' + this.queryString);
                    },
                },

                methods: {
                    setFilters(type, filters) {
                        this.filters[type] = filters;
                    },

                    clearFilters(type, filters) {
                        this.filters[type] = {};
                    },

                    getProducts() {
                        this.isDrawerActive = {
                            toolbar: false,
                            
                            filter: false,
                        };

                        this.$axios.get("{{ route('shop.api.products.index', ['category_id' => $category->id]) }}", {
                            params: this.queryParams 
                        })
                            .then(response => {
                                this.isLoading = false;

                                this.products = response.data.data;

                                this.links = response.data.links;
                            }).catch(error => {
                                console.log(error);
                            });
                    },

                    loadMoreProducts() {
                        if (this.links.next) {
                            this.$axios.get(this.links.next).then(response => {
                                this.products = [...this.products, ...response.data.data];

                                this.links = response.data.links;
                            }).catch(error => {
                                console.log(error);
                            });
                        }
                    },

                    removeJsonEmptyValues(params) {
                        Object.keys(params).forEach(function (key) {
                            if ((! params[key] && params[key] !== undefined)) {
                                delete params[key];
                            }

                            if (Array.isArray(params[key])) {
                                params[key] = params[key].join(',');
                            }
                        });

                        return params;
                    },

                    jsonToQueryString(params) {
                        let parameters = new URLSearchParams();

                        for (const key in params) {
                            parameters.append(key, params[key]);
                        }

                        return parameters.toString();
                    },

                    redirectToProduct(product) {
                        window.location.href = `{{ route('shop.product_or_category.index', '') }}/` + product.url_key;
                    },

                    addToWishlist(product_id) {
                        if (this.isCustomer) {
                            this.$axios.post(`{{ route('shop.api.customers.account.wishlist.store') }}`, {
                                    product_id: product_id
                                })
                                .then(response => {
                                    location.reload();
                                })
                                .catch(error => {});
                            } else {
                                window.location.href = "{{ route('shop.customer.session.index')}}";
                            }
                    },
                },
            });
        </script>
    @endPushOnce
</x-shop::layouts>