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


@push ('styles')
    <style>
        .product-price p {
            color: black !important;
        }
    </style>
@endpush

<x-shop::layouts>
    <!-- Page Title -->
    <x-slot:title>
        {{ trim($category->meta_title) != "" ? $category->meta_title : $category->name }}
    </x-slot>

    @if (in_array($category->display_mode, [null, 'products_only', 'products_and_description']))
        <v-category></v-category>
    @endif

    @pushOnce('scripts')
        <script
            type="text/x-template"
            id="v-category-template"
            >

            <div class="container px-[60px] max-lg:px-[30px]">
                <section class="pt-11">
                    <div class="flex justify-start">
                        <div class="flex items-center gap-x-[10px]">
                            <p class="flex items-center gap-x-[10px] text-lg font-normal text-dark">Home <span
                                    class="icon-arrow-right text-[10px] font-extrabold"></span></p>
                            <p class="flex items-center gap-x-[10px] text-lg font-normal text-dark">Our Brands <span
                                    class="icon-arrow-right text-[10px] font-extrabold"></span></p>
                            <p class="text-lg font-normal text-text-gray">{{$category->name}}</p>
                        </div>
                    </div>
                </section>

                <section class="py-11">
                    <div class="flex items-center justify-between rounded-[20px] border border-[#D9D9D9] px-6 py-5 max-sm:px-3 max-sm:py-3">
                        <img src="{{ bagisto_asset('images/elanvital-product.png') }}" alt="" class="max-sm:w-1/2">
                        <a href="#" class="block px-6 py-5 text-lg font-normal text-primary underline max-sm:px-2">Store Details</a>
                    </div>
                </section>

                <div class="mt-[40px] flex items-start gap-[40px] max-lg:gap-[20px]">
                    <!-- Product Listing Container -->
                    <div class="flex-1">
                        <!-- Desktop Product Listing Toolbar -->
                        <div class="max-md:hidden">
                            @include('shop::categories.toolbar')
                        </div>

                        <template v-if="products.length || isLoading">
                            <!-- Product Grid Card Container -->
                            <div>
                                <template v-if="! isLoading">
                                    <div class="grid grid-cols-2 gap-24 max-lg:gap-12 max-md:grid-cols-1">
                                        <div class="">
                                            <h2 class="text-lg font-bold text-dark">Middle Housing</h2>
                                            <div class="mt-11 grid grid-cols-2 gap-x-8 gap-y-11 max-sm:grid-cols-1">
                                                <div
                                                    v-for="product in priceGroupProducts.low"
                                                    class="">
                                                    <x-shop::media.images.lazy
                                                        @click="redirectToProduct(product)"
                                                        class="w-full cursor-pointer rounded-sm bg-[#F5F5F5] transition-all duration-300 group-hover:scale-105"
                                                        ::key="imageComponentRerander"
                                                        ::src="product.base_image.medium_image_url"
                                                    ></x-shop::media.images.lazy>
                                                    <h2
                                                        class="mt-5 text-xl font-bold text-dark"
                                                        v-text="product.name"
                                                        ></h2>
                                                    <p class="mt-1 text-lg font-normal text-primary">Calamba, Laguna</p>
                                                    <p class="mt-2 text-sm font-normal text-[#8B8B8B]">Price starts at</p>
                                                    <p
                                                        class="mt-1 text-xl font-bold text-dark"
                                                        v-text="product.min_price"
                                                        >
                                                    </p>
                                                    <span
                                                        class="mt-5 block w-full rounded-full border border-primary px-5 py-5 text-center text-lg font-normal text-primary max-lg:px-3 max-lg:py-3 cursor-pointer"
                                                        @click="redirectToProduct(product)"
                                                        >
                                                        View Property
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="">
                                            <h2 class="text-lg font-bold text-dark">Middle Condominium</h2>
                                            <div class="mt-11 grid grid-cols-2 gap-x-8 gap-y-11 max-sm:grid-cols-1">
                                                <div
                                                    v-for="product in priceGroupProducts.medium"
                                                    class="">
                                                    <x-shop::media.images.lazy
                                                        @click="redirectToProduct(product)"
                                                        class="w-full cursor-pointer rounded-sm bg-[#F5F5F5] transition-all duration-300 group-hover:scale-105"
                                                        ::key="imageComponentRerander"
                                                        ::src="product.base_image.medium_image_url"
                                                    ></x-shop::media.images.lazy>
                                                    <h2
                                                        class="mt-5 text-xl font-bold text-dark"
                                                        v-text="product.name"
                                                        ></h2>
                                                    <p class="mt-1 text-lg font-normal text-primary">Calamba, Laguna</p>
                                                    <p class="mt-2 text-sm font-normal text-[#8B8B8B]">Price starts at</p>
                                                    <p
                                                        class="mt-1 text-xl font-bold text-dark"
                                                        v-text="product.min_price"
                                                        >
                                                    </p>
                                                    <span
                                                        class="mt-5 block w-full rounded-full border border-primary px-5 py-5 text-center text-lg font-normal text-primary max-lg:px-3 max-lg:py-3 cursor-pointer"
                                                        @click="redirectToProduct(product)"
                                                        >
                                                        View Property
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>

                                <template v-else>
                                    <x-shop::shimmer.categories.view count="6"></x-shop::shimmer.categories.view>
                                </template>
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

                        <!-- Load More Button -->
                        <template v-if="isMoreLoading">
                            <x-shop::shimmer.products.cards.grid count="6"></x-shop::shimmer.products.cards.grid>
                        </template>

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

                        priceGroupProducts: [],

                        links: {},

                        isCustomer: '{{ auth()->guard("customer")->check() }}',

                        imageComponentRerander: 1,
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

                        this.isLoading = true;

                        this.$axios.get("{{ route('shop.api.products.index', ['category_id' => $category->id]) }}", {
                            params: this.queryParams
                        })
                        .then(response => {
                            ++this.imageComponentRerander;

                            this.isLoading = false;

                            this.products = response.data.data;

                            this.groupProducts(this.products);

                            console.log(this.products);


                            this.links = response.data.links;
                        }).catch(error => {
                            console.log(error);
                        });
                    },

                    loadMoreProducts() {
                        this.isMoreLoading = true;

                        if (this.links.next) {
                            this.$axios.get(this.links.next).then(response => {
                                this.products = [...this.products, ...response.data.data];

                                this.priceGroupProducts(this.products);

                                this.isMoreLoading = false;

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

                    groupProducts(products){
                        this.priceGroupProducts = {
                            low: products.filter(product => product.prices.final.price <= 50),
                            medium: products.filter(product => product.prices.final.price > 50)
                        };
                    }
                },
            });
        </script>
    @endPushOnce
</x-shop::layouts>
