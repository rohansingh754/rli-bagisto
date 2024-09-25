<template>
    <div class="content">
    	 <section class="homeful-hero-slider">
            <div class="container">
                <div class="mt-5 flex items-center justify-between">
                    <h1 class="text-[20px] font-bold text-dark">Featured Projects</h1>
                    <img :src="themeAssets + 'images/joy-icon.png'" alt="joy" class="mb-[-10px]">
                </div>
                <div class="homeful-slider-wrap relative mt-4">
                    <div class="homeful-slide active" data-slide="0" v-for="(item, index) in items" :key="index" v-if="slides[index]">
                        <div class="relative overflow-hidden rounded-[20px]">
                            <img  :src="themeAssets + 'images/hero-image.png'" alt="Agapeya Towns" class="w-full">
                            <div class="absolute bottom-0 left-0 right-0 flex items-start justify-between gap-4 bg-[linear-gradient(180deg,_#00000000_0%,_#000000_100%)] px-[20px] pb-[20px] pt-[120px] max-385:gap-2 max-385:px-3">
                                <div class="">
                                    <h2 class="text-[20px] font-normal leading-none text-white max-385:text-[18px]">Agapeya Towns {{index}}</h2>
                                    <p class="mt-1 text-[12px] font-normal leading-none text-[#CDCDCD]">Calamba, Laguna</p>
                                </div>
                                <a href="./product.html" class="flex items-center gap-2 rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-4 py-[14px] text-center text-[15px] font-medium text-white max-385:px-3 max-385:text-[13px]">View Project <span class="icon-arrow-right-stylish inline-block text-[24px] max-385:text-[16px]"></span></a>
                            </div>
                        </div>
                        <div class="mt-6 flex items-center justify-between gap-[16px]">
                            <div class="">
                                <p class="text-[12px] font-normal text-text-gray">Starts at</p>
                                <p class="homefull-text-gradient mt-[5px] text-[20px] font-bold leading-5">₱2,850,000</p>
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
                            <p class="mt-[5px] text-[15px] font-normal text-black">2 Storey Duplex (FA: 50sqm   LA:70sqm) 3 Bedroom, 1 Toilet and Bath and 1 Carport plus provision</p>
                        </div>
                    </div>

                    <span class="slide-prev absolute left-[-6px] top-1/3 z-20 flex h-[35px] w-[35px] cursor-pointer items-center justify-center border-2 border-[#E9E9E9] bg-white" @click="changeSlide(-1)"><span class="icon-arrow-left text-dark text-black"></span></span>
                    <span class="slide-next absolute right-[-6px] top-1/3 z-20 flex h-[35px] w-[35px] cursor-pointer items-center justify-center border-2 border-[#E9E9E9] bg-white text-black" @click="changeSlide(1)"><span class="icon-arrow-left rotate-180 text-dark text-black"></span></span>
                </div>
                <div class="scrollbar-hide mt-6 overflow-auto border-b-[1px] border-[#E2E2E2] pb-[15px]">
                    <div class="homeful-slider-thumbs flex w-[max-content] gap-3">
                        <div class="thumb active w-[75px] cursor-pointer" data-slide="0">
                            <img :src="themeAssets + 'images/hero-thumbnail-1.png'" alt="Agapeya" class="rounded-[8px] border border-transparent transition hover:border-primary">
                            <p class="mt-[5px] text-[12px] font-normal leading-none text-text-gray transition">Agapeya</p>
                        </div>
                        <div class="thumb w-[75px] cursor-pointer" data-slide="1">
                            <img :src="themeAssets + 'images/hero-thumbnail-2.png'" alt="Estanzia W" class="rounded-[8px] border border-transparent transition hover:border-primary">
                            <p class="mt-[5px] text-[12px] font-normal leading-none text-text-gray transition">Estanzia W</p>
                        </div>
                        <div class="thumb w-[75px] cursor-pointer" data-slide="2">
                            <img :src="themeAssets + 'images/hero-thumbnail-3.png'" alt="Zaya" class="rounded-[8px] border border-transparent transition hover:border-primary">
                            <p class="mt-[5px] text-[12px] font-normal leading-none text-text-gray transition">Zaya</p>
                        </div>
                        <div class="thumb w-[75px] cursor-pointer" data-slide="3">
                            <img :src="themeAssets + 'images/hero-thumbnail-4.png'" alt="Pagsibol" class="rounded-[8px] border border-transparent transition hover:border-primary">
                            <p class="mt-[5px] text-[12px] font-normal leading-none text-text-gray transition">Pagsibol</p>
                        </div>
                        <div class="thumb w-[75px] cursor-pointer" data-slide="4">
                            <img :src="themeAssets + 'images/hero-thumbnail-5.png'" alt="Pasinaya" class="rounded-[8px] border border-transparent transition hover:border-primary">
                            <p class="mt-[5px] text-[12px] font-normal leading-none text-text-gray transition">Pasinaya</p>
                        </div>
                        <div class="thumb w-[75px] cursor-pointer" data-slide="5">
                            <img :src="themeAssets + 'images/hero-thumbnail-6.png'" alt="Terraces at Tradizo" class="rounded-[8px] border border-transparent transition hover:border-primary">
                            <p class="mt-[5px] text-[12px] font-normal leading-none text-text-gray transition">Terraces at Tradizo</p>
                        </div>
                    </div>
                </div>
            </div>
	    </section>
        <!-- section about -->
        <section class="pt-[26px]" id="about">
            <div class="container">
                <h2 class="text-[20px] font-bold text-dark">About Homeful</h2>
                <img :src="themeAssets + 'images/about-homeful.png'" alt="About Homeful" class="mt-[25px] w-[100%] rounded-[20px]">
                <p class="mt-[25px] text-[15px] font-normal text-dark">HOMEFUL is an e-commerce platform featuring real estate projects in both Northern & Southern Luzon. We showcase diverse range of properties from developer Raemulan Lands Inc. </p>
                <p class="text-[15px] font-bold text-dark"><a href="#" >Read More</a></p>
            </div>
        </section>
        <!-- section about end -->

        <!-- section our brands -->
        <section class="pt-9">
            <div class="container">
                <h2 class="text-[20px] font-bold text-dark">Our Brands</h2>
                <div class="mt-3 grid grid-cols-3 gap-[9px]">
                    <div class="rounded-[9px] p-3 shadow-[0px_4px_4px] shadow-black/10">
                        <img :src="themeAssets + 'images/elenvital.png'" alt="elenvital" class="w-auto">
                        <div class="mt-5 min-h-[58px]">
                            <p class="text-[9px] font-bold text-[#343064]">
                                House & Lot<br>
                                ₱2.8M - ₱7.5M
                            </p>
                            <p class="mt-2 text-[9px] font-bold text-[#343064]">
                                Middle Condo<br>
                                ₱2.7M - ₱4.8M
                            </p>
                        </div>
                        <a href="#" class="mt-5 inline-block w-full rounded-full border-[.5px] border-primary px-[5px] py-2 text-center font-poppins text-[7px] font-medium text-primary">Visit Store</a>
                    </div>
                    <div class="rounded-[9px] p-3 shadow-[0px_4px_4px] shadow-black/10">
                        <img :src="themeAssets + 'images/everyhome.png'" alt="everyhome" class="w-auto">
                        <div class="mt-5 min-h-[58px]">
                            <p class="text-[9px] font-bold text-[#343064]">
                                House & Lot<br>
                                ₱1.5M
                            </p>
                        </div>
                        <a href="#" class="mt-5 inline-block w-full rounded-full border-[.5px] border-primary px-[5px] py-2 text-center font-poppins text-[7px] font-medium text-primary">Visit Store</a>
                    </div>
                    <div class="rounded-[9px] p-3 shadow-[0px_4px_4px] shadow-black/10">
                        <img :src="themeAssets + 'images/extraordinary.png'" alt="extraordinary" class="w-auto">
                        <div class="mt-5 min-h-[58px]">
                            <p class="text-[9px] font-bold text-[#343064]">
                                House & Lot<br>
                                ₱750K - ₱1.2M
                            </p>
                            <p class="mt-2 text-[9px] font-bold text-[#343064]">
                                Socialized Condo<br>
                                ₱750K - ₱1.4M
                            </p>
                        </div>
                        <a href="#" class="mt-5 inline-block w-full rounded-full border-[.5px] border-primary px-[5px] py-2 text-center font-poppins text-[7px] font-medium text-primary">Visit Store</a>
                    </div>
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

        <!-- section celebration -->
        <section class="pt-[60px]">
            <div class="container">
                <div class="flex items-center justify-between gap-[10px]">
                    <h2 class="text-[20px] font-bold text-dark">Celebrations</h2>
                    <a href="#" class="inline-block rounded-full px-[7px] py-[9px] text-center font-mont text-[14px] font-semibold text-primary underline">View All</a>
                </div>
                <div class="scrollbar-hide mt-[33px] w-full overflow-auto">
                    <div class="flex w-[max-content] gap-[14px]">
                        <div class="slide-card w-[155px]">
                            <img :src="themeAssets + 'images/celebration-1.png'" alt="Affiliate Marketer" class="w-full rounded-[20px]">
                            <p class="mt-3 text-[14px] font-bold text-dark">RLI’s Elanvital Enclaves Bags Two Major Awards From China Banking Corporation</p>
                            <a href="#" class="mt-3 inline-block text-center text-[14px] font-normal text-primary underline">Read more</a>
                        </div>
                        <div class="slide-card w-[155px]">
                            <img :src="themeAssets + 'images/celebration-2.png'" alt="Affiliate Marketer" class="w-full rounded-[20px]">
                            <p class="mt-3 text-[14px] font-bold text-dark">RLI’s Elanvital Enclaves Bags Two Major Awards From China Banking Corporation</p>
                            <a href="#" class="mt-3 inline-block text-center text-[14px] font-normal text-primary underline">Read more</a>
                        </div>
                        <div class="slide-card w-[155px]">
                            <img :src="themeAssets + 'images/celebration-1.png'" alt="Affiliate Marketer" class="w-full rounded-[20px]">
                            <p class="mt-3 text-[14px] font-bold text-dark">RLI’s Elanvital Enclaves Bags Two Major Awards From China Banking Corporation</p>
                            <a href="#" class="mt-3 inline-block text-center text-[14px] font-normal text-primary underline">Read more</a>
                        </div>
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
    import Advertisement        from './advertisements/advertisement';
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
            Advertisement,
        },

        data: function () {
			return {
                sliders: [],
				categories: [],
				advertisements: [],
                homePageContent: {},
                showCategories: false,
                product: {
                    'new'       : [],
                    'featured'  : [],
                    'categories': [],
                },

                themeAssets: window.config.themeAssetsPath,
                slides: [false, false, true],
                items:[1,5,2],
			}
        },

        computed: mapState({
            customer: state => state.customer,
        }),

        mounted () {

            this.getConfigValues();

            this.getCategories();

            this.getHomePageContent();

            this.getCustomer();
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
                        this.getProducts('new', { 'new': 1, limit: 4 });
                    }

                    if (response.data.data[enable_featured_key] == "1") {
                        this.getProducts('featured', { 'featured': 1, limit: 4 });
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

            getHomePageContent () {
                EventBus.$emit('show-ajax-loader');

                this.$http.get("/api/pwa/layout")
                    .then(response => {
                        EventBus.$emit('hide-ajax-loader');

                        let homePageContent = response.data.data.home_page_content;
                        let homePageContentArray = homePageContent.replace(/<\/?[^>]+(>|$)/g, "").split(",");

                        homePageContentArray.forEach(content => {

                            let base_content = content.toLowerCase().trim();
                            this.homePageContent[base_content] = {};

                            if (this.categories) {
                                this.categories.filter(category => {

                                    if (category.slug.toLowerCase() == base_content) {

                                        this.homePageContent[base_content] = {
                                            'products' : [],
                                            'category_details' : category,
                                        }

                                        this.getProducts(base_content, { 'category_id': category.id });
                                    }
                                });
                            }
                        });
                    })
                    .catch(function (error) {});
            },

            getCategories () {
                EventBus.$emit('show-ajax-loader');

                this.$http.get("/api/v1/descendant-categories", { params: { parent_id: window.channel.root_category_id } })
                    .then(response => {
                        EventBus.$emit('hide-ajax-loader');

                        this.categories = response.data.data;

                        this.categories.forEach(category => {

                            if (this.homePageContent[category.slug]) {
                                this.homePageContent[category.slug] = {
                                    'category_details' : category,
                                }

                                this.getProducts(category.slug, { 'category_id': category.id });
                            }
                        });
                    })
                    .catch(error => {});
            },

            getProducts (details, params) {
                EventBus.$emit('show-ajax-loader');
                this.$http.get("/api/v1/products", { params: params })
                    .then(response => {

                        EventBus.$emit('hide-ajax-loader');

                        if (params.category_id) {
                            if (this.homePageContent[details]) {
                                this.$set(this.homePageContent[details], 'products', response.data.data);

                                this.$forceUpdate();
                            }
                        } else {
                            this.product[details] = response.data.data;
                        }
                    })
                    .catch(error => {
                        console.log(error)
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
        }
    }
</script>

<style lang="scss">
    @import '~@/_variables.scss';

    .products {
        .list {
            padding: 16px;
        }
    }

    .slider-image {
        width: 100%;
    }

    .view-all-btn {
        color: blue !important;
    }

    .panel-heading {
        display: inline-block;
    }

    .category-title {
        a,
        span {
            display: block;
        }

        a {
            text-align: right;
        }
    }

    .VueCarousel-slide {
        position: relative;
    }

    .slider-image-container {
        z-index: 100;
        position: relative;
    }

    .show-content {
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: table;
        text-align: center;
        position: absolute;

        p {
            display: table-cell;
            vertical-align: middle;
        }
    }
</style>
