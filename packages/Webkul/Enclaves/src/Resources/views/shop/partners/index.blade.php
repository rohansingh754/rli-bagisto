
<x-shop::layouts>

@php
    $channel = core()->getCurrentChannel();
@endphp

<!-- SEO Meta Content -->
@push ('meta')
    <meta name="title" content="{{ $enableBlogSeoMetaTitle ?? ( $channel->home_seo['meta_title'] ?? '' ) }}" />

    <meta name="description" content="{{ $enableBlogSeoMetaKeywords ?? ( $channel->home_seo['meta_description'] ?? '' ) }}" />

    <meta name="keywords" content="{{ $enableBlogSeoMetaDescription ?? ( $channel->home_seo['meta_keywords'] ?? '' ) }}" />
@endPush

<!-- Page Title -->
<x-slot:title>
    @lang('blog::app.shop.blog.post.index.title')
</x-slot>

<v-blog-list></v-blog-list>

@pushOnce('scripts')
    <script type="text/x-template" id="v-blog-list-template">
        <!-- Section new place made just for you -->
        <div class="container px-[60px] max-lg:px-[30px]">
            <template v-if="isLoading">
                <!-- Shimmer Load -->
                <div class="shimmer rounded-1xl mt-[10px] h-[65px] w-[30%]"></div>

                <x-blog::shimmer.blogs.item count="6"/>
            </template>

            <template v-else>
                <!-- Breadcrumbs -->
                <x-shop::breadcrumbs name="partners"></x-shop::breadcrumbs>

                <h2 class="text-3xl font-bold text-dark mt-9">Partner with Us</h2>

                <div class="mt-11 grid grid-cols-3 gap-16 max-xl:gap-8 max-lg:grid-cols-2 max-md:grid-cols-1">
                    <x-enclaves-shop::partners.items.partner v-for="blog in blogs"/>
                </div>

                <div class="mt-3 text-center"
                    v-if="limit < blogs.length"
                >
                    <button
                        class="rounded-[20px] bg-[#CC035C] px-[25px] py-[10px] text-white"
                        @click="getMoreBlogs()"
                        v-text="loadMoreTxt"
                    >
                    </button>
                </div>
            </template>
        </div>
    </script>

    <script type="module">
        app.component('v-blog-list', {
            template: '#v-blog-list-template',

            data() {
                return {
                    isLoading: true,
                    blogs: {},
                    limit: 10,
                    loadMoreTxt: `{{ trans('blog::app.shop.blog.load-more') }}`,
                };
            },

            mounted() {
                this.getPosts();
            },

            methods: {
                getMoreBlogs() {
                    this.limit += 10;

                    this.loadMoreTxt = `{{ trans('blog::app.shop.blog.loading') }}`;

                    this.getPosts();
                },

                getPosts() {
                    this.$axios.get("{{ route('shop.blogs.front-end') }}", {
                        params: {
                            limit: this.limit,
                        }
                    })
                    .then(response => {
                        this.isLoading = false;

                        this.loadMoreTxt = `{{ trans('blog::app.shop.blog.load-more') }}`;

                        this.blogs = response.data.data;
                        console.log(this.blogs);

                    }).catch(error => {
                        console.log(error);
                    });
                },
            },
        });
    </script>
@endPushOnce

</x-shop::layouts>
