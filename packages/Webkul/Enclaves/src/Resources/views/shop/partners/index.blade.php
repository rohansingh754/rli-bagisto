
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
                    <div
                        v-for="blog in blogs"
                        class="relative h-full pb-14">
                        <div class="h-80 min-h-80 max-h-80">
                            <x-shop::media.images.lazy
                                class="relative h-full w-full"
                                ::src="blog.base_image"
                                ::alt="blog.base_image"
                            ></x-shop::media.images.lazy>
                        </div>

                        <div class="active group mt-11">
                            <h2 class="flex items-start justify-between gap-1 rounded-[18px] bg-[#F3F4F6] px-4 py-3 text-xl font-bold text-[#111827] max-sm:text-[16px]">
                                Affiliate Marketer
                                <span
                                    class="mt-1 block text-[24px] text-secondary"
                                    :class="blog.accordian ? 'icon-arrow-up' : 'icon-arrow-down'"
                                    @click="blog.accordian = !blog.accordian"
                                ></span>
                            </h2>
                        </div>

                        <div
                            v-if="blog.accordian"
                            class="group-[.active]:block">
                            <div class="bg-white p-5">
                                <p class="line-clamp-[25] overflow-hidden text-ellipsis text-[15px] font-normal leading-[18px] text-[#0F0E0E]">
                                    Are you looking to boost your income effortlessly? <br><br>
                                    Join our "Affiliate Marketer" program today! Perfect for digital marketers, social media influencers, housewives and office worker.<br><br>
                                    <strong class="text-[19px] leading-[22px]">Here's how it works:</strong><br>
                                    1. 📣 Simply advertise our provided ads with your personalized link.<br>
                                    2. 💰 Earn referral income when  your link leads to a successfully property purchases.<br>
                                    3. 💸 Get as much as 20,000 pesos for every 1,000,000 successful sales! (taxes may apply).<br><br>
                                    Seize the chance to make money from the comfort of your home or work.  Join us now and start earning while you refer buyers to us!<br><br>
                                    Interested?
                                    Are you looking to boost your income effortlessly? <br><br>
                                    Join our "Affiliate Marketer" program today! Perfect for digital marketers, social media influencers, housewives and office worker.<br><br>
                                    <strong class="text-[19px] leading-[22px]">Here's how it works:</strong><br>
                                    1. 📣 Simply advertise our provided ads with your personalized link.<br>
                                    2. 💰 Earn referral income when  your link leads to a successfully property purchases.<br>
                                    3. 💸 Get as much as 20,000 pesos for every 1,000,000 successful sales! (taxes may apply).<br><br>
                                    Seize the chance to make money from the comfort of your home or work.  Join us now and start earning while you refer buyers to us!<br><br>
                                    Interested?
                                </p>
                                <a href="./product.html" class="absolute inset-x-0 bottom-0 mt-2.5 block rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-4 py-[14px] text-center text-[15px] font-medium text-white max-385:px-3 max-385:text-[13px]">Join Us</a>
                            </div>
                        </div>
                    </div>
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
                    accordianStatus:[],
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

                        this.blogs.forEach((ele, index) => {
                            ele['accordian'] = true;
                        });

                    }).catch(error => {
                        console.log(error);
                    });
                },
            },
        });
    </script>
@endPushOnce

</x-shop::layouts>
