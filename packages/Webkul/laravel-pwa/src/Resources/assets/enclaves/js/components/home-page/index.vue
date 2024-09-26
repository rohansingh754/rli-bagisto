<template>
    <div class="content">
        <welcome-model></welcome-model>

    	<section class="homeful-hero-slider">
            <div class="container">
                <div class="mt-5 flex items-center justify-between">
                    <h1 class="text-[20px] font-bold text-dark">Featured Projects</h1>
                    <img :src="themeAssets + 'images/joy-icon.png'" alt="joy" class="mb-[-10px]">
                </div>
                <div class="homeful-slider-wrap relative mt-4">
                    <div
                        class="homeful-slide active"
                        v-for="(item, index) in activeSliderData.products"
                        :key="index"
                        v-if="slides[index]"
                        >
                        <div class="relative overflow-hidden rounded-[20px]">
                            <img  :src="item.base_image.medium_image_url" alt="Agapeya Towns" class="w-full">
                            <div class="absolute bottom-0 left-0 right-0 flex items-start justify-between gap-4 bg-[linear-gradient(180deg,_#00000000_0%,_#000000_100%)] px-[20px] pb-[20px] pt-[120px] max-385:gap-2 max-385:px-3">
                                <div class="">
                                    <h2 class="text-[20px] font-normal leading-none text-white max-385:text-[18px]">{{item.name}}</h2>
                                    <p class="mt-1 text-[12px] font-normal leading-none text-[#CDCDCD]">{{item.description}}</p>
                                </div>
                                <router-link :to="'/products/' + item.id">
                                <button href="./product.html" class="flex items-center gap-2 rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-4 py-[14px] text-center text-[15px] font-medium text-white max-385:px-3 max-385:text-[13px]">
                                    View Project
                                    <span class="icon-arrow-right-stylish inline-block text-[24px] max-385:text-[16px]"></span>
                                    </button>
                                </router-link>
                            </div>
                        </div>
                        <div class="mt-6 flex items-center justify-between gap-[16px]">
                            <div class="">
                                <p class="text-[12px] font-normal text-text-gray">Starts at</p>
                                <p class="homefull-text-gradient mt-[5px] text-[20px] font-bold leading-5">{{item.formatted_price}}</p>
                            </div>
                            <div class="w-[127px]">
                                <p class="text-[12px] font-normal text-text-gray">Total Sold</p>
                                <p class="mt-[5px] text-[20px] font-bold leading-5 text-black">200+</p>
                            </div>
                            <div class="">
                                <img :src="themeAssets + 'images/elenvital.png'" alt="elenvital">
                            </div>
                        </div>
                        <div class="mt-6">
                            <p class="text-[12px] font-normal text-text-gray">Product type</p>
                            <p class="mt-[5px] text-[15px] font-normal text-black">{{truncateText(stripTags(item.description), 95)}}</p>
                        </div>
                    </div>

                    <span v-if="activeSliderData.products.length > 1" class="slide-prev absolute left-[-6px] top-1/3 z-20 flex h-[35px] w-[35px] cursor-pointer items-center justify-center border-2 border-[#E9E9E9] bg-white" @click="changeSlide(-1)"><span class="icon-arrow-left text-dark text-black"></span></span>
                    <span v-if="activeSliderData.products.length > 1" class="slide-next absolute right-[-6px] top-1/3 z-20 flex h-[35px] w-[35px] cursor-pointer items-center justify-center border-2 border-[#E9E9E9] bg-white text-black" @click="changeSlide(1)"><span class="icon-arrow-left rotate-180 text-dark text-black"></span></span>
                </div>
                <div
                    v-if="sliderData.length"
                    class="scrollbar-hide mt-6 overflow-auto border-b-[1px] border-[#E2E2E2] pb-[15px]">
                    <div class="homeful-slider-thumbs flex w-[max-content] gap-3">
                        <div
                            class="thumb w-[75px] cursor-pointer"
                            v-for="(slider, i) in sliderData"
                            :key="i"
                            :class="{ 'active': slider.category.id === activeSliderData.category.id }"
                            @click="changeSlideCategory(slider)"
                            >
                            <img :src="slider.category.logo_url" alt="Agapeya" class="rounded-[8px] border border-transparent transition hover:border-primary">
                            <p class="mt-[5px] text-[12px] font-normal leading-none text-text-gray transition">{{slider.category.name}}</p>
                        </div>
                    </div>
                </div>
            </div>
	    </section>
        <!-- section about -->
            <page-card :page="pages['about-us']" :textTruncate="175"></page-card>
        <!-- section about end -->

        <!-- section our brands (Categories) -->
        <section class="pt-9">
            <div class="container">
                <h2 class="text-[20px] font-bold text-dark">Our Brands</h2>
                <div class="mt-3 grid grid-cols-3 gap-[9px]">
                    <category-card v-for="category in categories" :key='category.uid' :category="category"></category-card>
                </div>
            </div>
        </section>
        <!-- section our brands emd -->

        <!-- section looking for home -->
        <section class="relative mt-[76px] bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] pb-[30px] pt-[30px]">
            <div class="container">
                <div class="w-[184px]">
                    <h2 class="text-[22px] font-bold leading-[26px] text-white">Looking for a home that suits you? Ask Joy</h2>
                    <a href="#" class="mt-2 inline-block rounded-full bg-white px-9 py-4 text-center text-[14px] font-normal text-primary">Ask Joy</a>
                    <img :src="themeAssets + 'images/ask-joy.png'" alt="Ask Joy" class="absolute bottom-[-18px] right-0 top-[-19px] max-[360px]:hidden">
                </div>
            </div>
        </section>
        <!-- section looking for home end -->

        <!-- section partners -->
        <section :class="'bg-[url(' + themeAssets + 'images/bg-image.png)] pt-[60px]'">
            <div class="container">
                <h2 class="text-[20px] font-bold text-dark">Partner with us</h2>
                <div class="scrollbar-hide mt-8 w-full overflow-auto">
                    <div class="flex w-[max-content] gap-4">
                        <div class="slide-card w-[205px] rounded-[9px] bg-white p-[10px] shadow-[0px_4px_4px] shadow-black/10">
                            <img :src="themeAssets + 'images/partner-1.png'" alt="Affiliate Marketer" class="w-full rounded-[8px]">
                            <h3 class="mt-[10px] text-[17px] font-bold text-dark">Affiliate Marketer</h3>
                            <p class="mt-[10px] text-[14px] font-normal text-dark">Are you looking to boost your income effortlessly? <br><br>
                                Join our "Affiliate Marketer" program today! Perfect for digital marketers, social media influencers, housewives and office worker.<br><br>
                                Here’s how it works...</p>
                            <div class="mt-[10px] flex items-center gap-[2px]">
                                <a href="#" class="inline-block rounded-full px-[7px] py-[9px] text-center text-[14px] font-medium text-primary underline">Read more</a>
                                <a href="#" class="inline-block rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-[26px] py-[9px] text-center text-[14px] font-medium text-white">Join Us</a>
                            </div>
                        </div>
                        <div class="slide-card w-[205px] rounded-[9px] bg-white p-[10px] shadow-[0px_4px_4px] shadow-black/10">
                            <img :src="themeAssets + 'images/partner-1.png'" alt="Affiliate Marketer" class="w-full rounded-[8px]">
                            <h3 class="mt-[10px] text-[17px] font-bold text-dark">Affiliate Marketer</h3>
                            <p class="mt-[10px] text-[14px] font-normal text-dark">Are you looking to boost your income effortlessly? <br><br>
                                Join our "Affiliate Marketer" program today! Perfect for digital marketers, social media influencers, housewives and office worker.<br><br>
                                Here’s how it works...</p>
                            <div class="mt-[10px] flex items-center gap-[2px]">
                                <a href="#" class="inline-block rounded-full px-[7px] py-[9px] text-center text-[14px] font-medium text-primary underline">Read more</a>
                                <a href="#" class="inline-block rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-[26px] py-[9px] text-center text-[14px] font-medium text-white">Join Us</a>
                            </div>
                        </div>
                        <div class="slide-card w-[205px] rounded-[9px] bg-white p-[10px] shadow-[0px_4px_4px] shadow-black/10">
                            <img :src="themeAssets + 'images/partner-1.png'" alt="Affiliate Marketer" class="w-full rounded-[8px]">
                            <h3 class="mt-[10px] text-[17px] font-bold text-dark">Affiliate Marketer</h3>
                            <p class="mt-[10px] text-[14px] font-normal text-dark">Are you looking to boost your income effortlessly? <br><br>
                                Join our "Affiliate Marketer" program today! Perfect for digital marketers, social media influencers, housewives and office worker.<br><br>
                                Here’s how it works...</p>
                            <div class="mt-[10px] flex items-center gap-[2px]">
                                <a href="#" class="inline-block rounded-full px-[7px] py-[9px] text-center text-[14px] font-medium text-primary underline">Read more</a>
                                <a href="#" class="inline-block rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-[26px] py-[9px] text-center text-[14px] font-medium text-white">Join Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section partners end-->

        <!-- section celebration (New and Updates)-->
        <section class="pt-[60px]" v-if="newses.length">
            <div class="container">
                <div class="flex items-center justify-between gap-[10px]">
                    <h2 class="text-[20px] font-bold text-dark">Celebrations</h2>
                    <router-link :to="'/celebrations'">
                        <button class="inline-block rounded-full px-[7px] py-[9px] text-center font-mont text-[14px] font-semibold text-primary underline">View All</button>
                    </router-link>
                </div>
                <div class="scrollbar-hide mt-[33px] w-full overflow-auto">
                    <div class="flex w-[max-content] gap-[14px]">
                        <news-card v-for="(news, index) in newses" :key="index" :news="news" :textTruncate="175"></news-card>
	                </div>
                </div>
            </div>
        </section>
        <!-- section celebration end-->

         <div class="panel" style="margin-bottom: 0">
            <div class="panel-content">
                <footer-nav></footer-nav>
            </div>
         </div>
    </div>
</template>

<script>
    import { Carousel, Slide }  from 'vue-carousel';
    import ProductCard          from '../products/card';
    import CategoryCard         from '../categories/card';
    import FooterNav            from '../layouts/footer-nav';
    import WelcomeModel         from '../layouts/welcome-model';
    import PageCard             from '../page/card';
    import NewsCard             from '../news/card';
    import {
        mapState,
        mapActions
    } from 'vuex';

    export default {
        name: 'home',

        components: {
            Slide,
            Carousel,
            FooterNav,
            ProductCard,
            CategoryCard,
            WelcomeModel,
            PageCard,
            NewsCard,
        },

        data: function () {
			return {
                sliders: [],
				categories: [],
                homePageContent: {},
                showCategories: false,
                product: {
                    'new'       : [],
                    'featured'  : [],
                    'categories': [],
                },

                themeAssets: window.config.themeAssetsPath,
                sliderData: [],
                activeSliderData:{
                    'category': {},
                    'products': {},
                },
                slides: [],
                pages: {
                    'terms-of-use': {},
                    'about-us': {},
                    'hello-ji': {},
                },
                newses:[],
			}
        },

        computed: mapState({
            customer: state => state.customer,
        }),

        mounted () {
            // this.getConfigValues();

            this.getCategories();

            this.getCustomer();

            this.getPage(this.pages);

            this.getNews();
        },

        methods: {
            ...mapActions([
                'getCustomer',
            ]),

            getSliders () {
                this.$http.get("/api/pwa/sliders")
                    .then(response => {

                        this.sliders = response.data.images;

                        this.sliders.forEach(item => {
                            if (!item.image.startsWith(window.config.app_base_url)) {
                                item.image = window.config.app_base_url + item.image;
                            }
                        });
                    })
                    .catch(function (error) {});
            },

            getConfigValues () {
                EventBus.$emit('show-ajax-loader');

                var enable_new_key = 'pwa.settings.general.enable_new';
                var enable_slider_key = 'pwa.settings.general.enable_slider';
                var enable_featured_key = 'pwa.settings.general.enable_featured';
                var enable_categories_home_page_listing_key = 'pwa.settings.general.enable_categories_home_page_listing';

                const configKeys = [
                    enable_new_key,
                    enable_slider_key,
                    enable_featured_key,
                    enable_categories_home_page_listing_key,
                ];

                this.$http.get("/api/v1/core-configs", {
                    params: {
                        _config: configKeys
                    }
                }).then(response => {

                    EventBus.$emit('hide-ajax-loader');
                    if (response.data.data[enable_new_key] == "1") {
                        this.getProducts({ 'new': 1, limit: 4 });
                    }

                    if (response.data.data[enable_featured_key] == "1") {
                        this.getProducts( { 'featured': 1, limit: 4 });
                    }

                    if (response.data.data[enable_slider_key] == "1") {
                        this.getSliders();
                    }

                    if (response.data.data[enable_categories_home_page_listing_key] == "1") {
                        this.showCategories = true;
                    }
                })
                .catch(error =>  {
                    console.error(error);
                });
            },

            async getCategories() {
                try {
                    EventBus.$emit('show-ajax-loader');

                    const response = await this.$http.get("/api/v1/descendant-categories", { params: { parent_id: window.channel.root_category_id } });

                    this.categories = response.data.data;
                    console.log('categories', this.categories);


                    for (const category of this.categories) {
                        const products = await this.getProducts({ 'category_id': category.id, 'limit': 4 });

                        if (products.length) {
                            this.sliderData.push({
                                'category': category,
                                'products': products,
                            });
                        }
                    }

                    if (this.sliderData.length) {
                        this.activeSliderData = this.sliderData[0];

                        this.activeSliderData.products.forEach((data, i) => {

                            this.slides[i] = i === 0 ? true : false;
                        });
                    }

                    EventBus.$emit('hide-ajax-loader');

                    console.log(this.sliderData, this.activeSliderData, this.slides);
                } catch (error) {
                    console.error(error);
                }
            },

            async getProducts(params) {
                try {
                    const response = await this.$http.get("/api/v1/products", { params: params });

                    return response.data.data;
                } catch (error) {
                    console.error(error);
                    return [];
                }
            },

            changeSlideCategory(slider){
                this.activeSliderData = slider;
                this.slides = [];

                this.activeSliderData.products.forEach((data, i) => {
                    this.slides[i] = i === 0 ? true : false;
                });
            },

            changeSlide(i){
                let currentSlide = 0;
                let newSlides = this.slides;

                this.slides.forEach((value, index) => {
                    if (value === true) {
                        currentSlide = index;
                        return
                    }
                });

                let newActiveSlide = currentSlide + (i);
                this.slides = this.slides.map(() => false);

                if (this.slides[newActiveSlide] !== undefined) {
                    this.slides[newActiveSlide] = true;
                } else{
                    if (i > 0) {
                        this.slides[0] = true;
                    } else{
                        this.slides[this.slides.length - 1] = true;
                    }
                }
            },

            stripTags(html){
                const div = document.createElement("div");
                div.innerHTML = html;
                let text = div.textContent || div.innerText || "";

                return text;
            },

            truncateText(text, maxLength) {
                if (text.length <= maxLength) {
                    return text;
                }

                return text.substring(0, maxLength) + '...';
            },

            async getPage(pages){
                EventBus.$emit('show-ajax-loader');

                let data = Object.keys(pages);

                for (const slug in pages) {
                    const response = await this.$http.get("/api/pwa/page/" + slug);
                    this.pages[slug] = response.data.data;
                }

                EventBus.$emit('hide-ajax-loader');
            },

            async getNews(){
                EventBus.$emit('show-ajax-loader');

                const response = await this.$http.get("/api/pwa/new-list");

                if (response.data.data) {
                    this.newses = response.data.data
                }

                EventBus.$emit('hide-ajax-loader');
            }
        }
    }
</script>
