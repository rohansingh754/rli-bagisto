<template>
    <div>
    <!-- breadcrumb -->
	    <breadcrumb :links="breadcrumbLinks" ></breadcrumb>
	<!-- breadcrumb end -->

	 <!-- store link -->
    <section class="mt-3">
        <div class="container">
            <div class="flex items-center justify-between gap-4 rounded-[20px] border border-[#D9D9D9] px-5 py-2 max-385:gap-2 max-385:px-3">
                <image-component
                    :src="themeAssets + 'images/elanvital-product.png'"
                    :classes="'max-w-[90px]'"
                    >
                </image-component>
                <image-component
                    :src="themeAssets + 'images/agapeya-product.png'"
                    :classes="'max-w-[90px]'"
                    >
                </image-component>
                <!-- <img :src="themeAssets + 'images/elanvital-product.png'" alt="" class="max-w-[90px]"> -->
                <a href="#" class="text-[12px] font-medium text-primary underline">Visit Store</a>
            </div>
        </div>
    </section>
	 <!-- store link end-->

	 <!-- slider section -->
	  <section class="product-slider mt-5">
		<div class="homeful-slider-wrap relative mt-4">
			<div class="homeful-slide active">
                <image-component
                    :src="sliderActiveImage.large_image_url"
                    :alt="'Facade'"
                    :classes="'w-full'"
                    >
                </image-component>
			</div>
		</div>
		<div
            v-if="product"
            class="scrollbar-hide mt-6 overflow-auto">
			<div class="homeful-slider-thumbs flex w-[max-content] gap-3">
				<div
                    v-for="(image, index) in product.images"
                    :key="index"
                    :class="sliderActiveImage.id === image.id ? 'active' : ''"
                    class="thumb ml-5 w-[75px] cursor-pointer"
                    @click="changeSlideImage(image)"
                    >
                    <image-component
                        :src="image.large_image_url"
                        :alt="'Facade'"
                        :classes="'rounded-[8px] border border-transparent transition hover:border-primary'"
                        >
                    </image-component>
					<p class="mt-[5px] text-[12px] font-normal leading-none text-text-gray transition">Facade</p>
				</div>
			</div>
		</div>
	  </section>
	 <!-- slider section end-->

	 <section class="mt-7" v-if="product">
		<div class="container">
			<div class="mt-6 flex items-center justify-start gap-4 border-b border-[#D9D9D9] pb-6">
				<div class="">
					<p class="text-[12px] font-normal text-text-gray">Starts at</p>
					<p class="homefull-text-gradient mt-[5px] text-[20px] font-bold leading-5">{{product.formatted_price}}</p>
				</div>
				<div class="w-[127px]">
					<p class="text-[12px] font-normal text-text-gray">Total Sold</p>
					<p class="mt-[5px] text-[20px] font-bold leading-5 text-black">200+</p>
				</div>
			</div>
			<h1 class="mt-8 text-[20px] font-bold text-dark">{{product.name}}</h1>
			<p class="mt-2 text-[14px] font-semibold text-primary">Calamba, Laguna</p>
			<p
                class="product-description mt-5 border-b border-[#D9D9D9] text-[15px] font-normal text-dark"
                v-html="productDes"
                >
            </p>
			<span class="text-[15px] font-bold text-dark" v-if="shouldShowButton" @click="toggleShowMore()">
                 {{ showMore ? 'Show Less' : 'Show More' }}
            </span>

			<!-- features -->
            <attributes :product="product"></attributes>
			<!-- features end-->
		</div>
	</section>

    <div class="panel" style="margin-bottom: 0">
        <div class="panel-content">
            <footer-nav></footer-nav>
        </div>
    </div>

	<div class="schedule-visit fixed inset-x-0 bottom-0 z-50 flex items-center justify-center gap-7 bg-white p-6 w-full">
		<a href="#" class="flex flex-col items-center gap-1 text-[12px] font-normal text-[#8B8B8B] w-24">
			<span>
				<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M4.75 1V3.25M15.25 1V3.25M1 16.75V5.5C1 4.90326 1.23705 4.33097 1.65901 3.90901C2.08097 3.48705 2.65326 3.25 3.25 3.25H16.75C17.3467 3.25 17.919 3.48705 18.341 3.90901C18.7629 4.33097 19 4.90326 19 5.5V16.75M1 16.75C1 17.3467 1.23705 17.919 1.65901 18.341C2.08097 18.7629 2.65326 19 3.25 19H16.75C17.3467 19 17.919 18.7629 18.341 18.341C18.7629 17.919 19 17.3467 19 16.75M1 16.75V9.25C1 8.65326 1.23705 8.08097 1.65901 7.65901C2.08097 7.23705 2.65326 7 3.25 7H16.75C17.3467 7 17.919 7.23705 18.341 7.65901C18.7629 8.08097 19 8.65326 19 9.25V16.75" stroke="url(#paint0_linear_4447_6623)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					<defs>
					<linearGradient id="paint0_linear_4447_6623" x1="10" y1="1" x2="10" y2="19" gradientUnits="userSpaceOnUse">
					<stop stop-color="#D21755"/>
					<stop offset="1" stop-color="#FAAA19"/>
					</linearGradient>
					</defs>
					</svg>
			</span>
			Schedule Visit
		</a>
		<a href="#" class="flex items-center gap-2 rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-11 py-[14px] text-[16px] font-medium text-white max-385:px-6 max-385:text-[13px]">Avail Now<br>for P10,000 <span><svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M27.2509 12.6739L26.2715 12.0866C25.8541 11.8359 25.5731 11.4236 25.4452 10.9557C25.4435 10.9473 25.4418 10.9372 25.4385 10.9288C25.3072 10.4559 25.3459 9.95276 25.5849 9.52363L26.1386 8.52403C26.7057 7.50422 25.9804 6.24714 24.8125 6.22694L23.6597 6.20843C23.1717 6.19834 22.719 5.98293 22.3757 5.63795C22.3723 5.63458 22.3673 5.63122 22.3639 5.62785C22.0189 5.28287 21.8018 4.83018 21.7951 4.34216L21.7749 3.18941C21.7547 2.01983 20.4976 1.29453 19.4761 1.86165L18.4782 2.41698C18.0491 2.65427 17.5459 2.69297 17.0713 2.56339C17.0629 2.56171 17.0545 2.55834 17.0461 2.55498C16.5782 2.42708 16.1643 2.14605 15.9152 1.7287L15.3279 0.750969C14.7271 -0.250323 13.2765 -0.250323 12.6757 0.750969L12.0901 1.72534C11.8393 2.14605 11.422 2.42876 10.9508 2.55834C10.9457 2.55834 10.9407 2.56171 10.9356 2.56171C10.4594 2.69297 9.95115 2.65427 9.51866 2.4153L8.52409 1.86165C7.5026 1.29453 6.2455 2.01983 6.22531 3.18773L6.2068 4.34048C6.19838 4.8285 5.98129 5.28119 5.63631 5.62449C5.63294 5.62785 5.62958 5.6329 5.62621 5.63627C5.28123 5.98125 4.82854 6.19834 4.34051 6.20507L3.18943 6.22526C2.01985 6.24545 1.29454 7.50254 1.86166 8.52403L2.417 9.52195C2.65429 9.95108 2.69299 10.4542 2.56341 10.9288C2.56173 10.9372 2.55836 10.9456 2.555 10.9541C2.4271 11.4219 2.14606 11.8359 1.72871 12.0849L0.750975 12.6722C-0.250325 13.273 -0.250325 14.7253 0.750975 15.3244L1.72871 15.9134C2.14606 16.1625 2.42878 16.5748 2.555 17.0443C2.55836 17.0527 2.56005 17.0611 2.56341 17.0695C2.69299 17.5441 2.65429 18.0456 2.417 18.4764L1.86166 19.476C1.29622 20.4975 2.02153 21.7545 3.18943 21.7747L4.34051 21.7933C4.82854 21.8017 5.28123 22.0188 5.62621 22.3637C5.62958 22.3671 5.63294 22.3705 5.63631 22.3738C5.98298 22.7188 6.19838 23.1715 6.2068 23.6595L6.22531 24.8106C6.2455 25.9768 7.5026 26.7038 8.52409 26.1367L9.52202 25.583C9.95115 25.3441 10.4543 25.3053 10.9289 25.4366C10.9373 25.4383 10.9457 25.44 10.9541 25.4433C11.422 25.5712 11.836 25.8523 12.085 26.2696L12.6723 27.249C13.2731 28.2503 14.7237 28.2503 15.3245 27.249L15.9118 26.2696C16.1609 25.8523 16.5749 25.5712 17.0427 25.4433C17.0511 25.4417 17.0595 25.4383 17.068 25.4366C17.5408 25.3053 18.0457 25.3441 18.4748 25.583L19.4728 26.1367C20.4942 26.7038 21.7513 25.9768 21.7715 24.8106L21.79 23.6595C21.7985 23.1715 22.0156 22.7188 22.3605 22.3738C22.3639 22.3705 22.3673 22.3671 22.3706 22.3637C22.7156 22.0171 23.1683 21.8017 23.6563 21.7933L24.8074 21.7747C25.9753 21.7545 26.7023 20.4975 26.1352 19.476L25.5798 18.478C25.3426 18.0489 25.3039 17.5458 25.4334 17.0712C25.4368 17.0628 25.4385 17.0544 25.4418 17.0459C25.5697 16.5781 25.8508 16.1641 26.2681 15.9151L27.2459 15.3261C28.2505 14.7253 28.2505 13.2747 27.2509 12.6739ZM20.1459 11.5296L13.0813 18.5958C12.8793 18.7978 12.605 18.9105 12.3206 18.9105C12.0345 18.9105 11.7602 18.7978 11.5583 18.5958L7.83917 14.8768C7.41845 14.4561 7.41845 13.7745 7.83917 13.3538C8.25988 12.9331 8.94144 12.9331 9.36215 13.3538L12.3206 16.3105L18.6246 10.0083C19.0453 9.5859 19.7252 9.5859 20.1459 10.0083C20.5683 10.429 20.5683 11.1089 20.1459 11.5296Z" fill="white"/>
			</svg></span></a>
	</div>

    </div>
</template>

<script>
    import Stock                    from './stock';
    import Price                    from './price';
    import Review                   from './review';
    import Reviews                  from './reviews';
    import Attributes               from './attributes';
    import SocialLinks              from './social-links';
    import GalleryImages            from './gallery-images';
    import BundleOptions            from './bundle-options';
    import BookingOptions           from './booking-options';
    import Accordian                from '../shared/accordian';
    import ConfigurableOptions      from './configurable-options';
    import DownloadableOptions      from './downloadable-options';
    import GroupedProductsOptions   from './grouped-products-options';
    import FooterNav                from '../layouts/footer-nav';
    import ImageComponent           from "../common/image-component";
	import Breadcrumb               from "../common/breadcrumb";

    export default {
        name: 'product',

        components: {
            Price,
            Stock,
            Review,
            Reviews,
            Accordian,
            Attributes,
            SocialLinks,
            BundleOptions,
            GalleryImages,
            BookingOptions,
            DownloadableOptions,
            ConfigurableOptions,
            GroupedProductsOptions,
            FooterNav,
            ImageComponent,
            Breadcrumb
        },

        data () {
			return {
                themeAssets: window.config.themeAssetsPath,
				product: null,
                breadcrumbLinks:[
					{
						'name': 'Home',
						'redirect':'/'
					},
					{
                        'name': 'Products',
						'redirect':'/products'
					},
					{
                        'name': 'Product',
					},
				],
                formData: {
                    product_id: this.$route.params.id,

                    quantity: 1,

                    is_buy_now: 0,

                    super_attribute: {},

                    selected_configurable_option: 0
                },
                sliderActiveImage: {},
                showMore: false,
                maxWords: 450,
            }
        },

        watch: {
            '$route.params.id': function (id) {
                this.getProduct(id);
            }
        },

        computed:{
            productDes(){
                if (this.showMore) {
                    return this.product.description;
                } else {

                    return this.truncateHtml(this.product.description, this.maxWords);
                }
            },
            shouldShowButton() {
                return this.wordCount > this.maxWords;
            },

            wordCount() {
                const text = this.stripTags(this.product.description);
                return text.split(' ').length;
            },
        },

        mounted () {
            this.getProduct(this.$route.params.id);
        },

        methods: {
            getProduct (productId) {
                EventBus.$emit('show-ajax-loader');

                this.$http.get('/api/v1/products/' + productId)
                    .then(response => {
                        this.product = response.data.data;

                        this.sliderActiveImage = this.product.images[0];

                        this.breadcrumbLinks[this.breadcrumbLinks.length - 1].name = this.product.name;

                        if (this.product.type == "grouped") {
                            this.formData.qty = {};
                            delete(this.formData['quantity']);

                            this.product.grouped_products.forEach(product => {
                                this.$set(this.formData.qty, product.id, product.qty);
                            });
                        }

                        if (this.product.type == "downloadable") {
                            this.formData.links = {};
                        }

                        if (this.product.type == "bundle") {
                            delete(this.formData['super_attribute']);
                            delete(this.formData['selected_configurable_option']);

                            this.formData.qty_options = {};
                            this.formData.bundle_options = {};
                            this.formData.bundle_option_qty = {};

                            this.product.bundle_options.options.forEach(option => {
                                this.formData.qty_options[option.id] = {};

                                option.products.forEach((product, key) => {
                                    this.formData.qty_options[option.id][product.id] = option.products[key].qty;
                                });

                                this.formData.bundle_options[option.id] = [0];
                                this.formData.bundle_option_qty[5] = 7;
                            });
                        }

                        if (this.product.type == "booking") {
                            delete(this.formData['super_attribute']);
                            delete(this.formData['selected_configurable_option']);

                            if (this.product.booking_product.type == "event") {
                                this.formData.booking = {
                                    qty: {}
                                };

                                this.product.booking_product.tickets.forEach(ticket => {
                                    this.formData.booking.qty[ticket.id] = 0;
                                });

                            } else if(this.product.booking_product.type == "rental") {
                                if (this.product.booking_product.renting_type == "daily_hourly") {
                                    this.formData.booking = {
                                        "date": "",
                                        'renting_type': 'hourly',
                                        "slot": {
                                            "from"  : "",
                                            "to"    : "",
                                        }
                                    };
                                } else {
                                    this.formData.booking = {
                                        'date_to': '',
                                        'date_from': '',
                                    };
                                }
                            } else if(this.product.booking_product.type == "table") {
                                this.formData.booking = {
                                    "note": "",
                                    "date": "",
                                    "slot": "",
                                };
                            } else {
                                this.formData.booking = {
                                    'slot': '',
                                    'date': '',
                                };
                            }
                        }

                        EventBus.$emit('hide-ajax-loader');
                    })
                    .catch(function (error) {});
            },

            validateBeforeSubmit (event) {
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        this.addToCart();
                    }
                });
            },

            addToCart (event) {
                const token = JSON.parse(localStorage.getItem("token"));
                if (token) {
                    EventBus.$emit('show-ajax-loader');
                    var formData = this.formData;

                    this.$http.post("/api/v1/customer/cart/add/" + this.$route.params.id, formData)
                    .then(response => {
                        this.$toasted.show(response.data.message, { type: 'success' })

                        EventBus.$emit('hide-ajax-loader');

                        EventBus.$emit('checkout.cart.changed', response.data.data);

                        if (this.is_buy_now) {
                            this.$router.push({name: 'onepage'})
                        }
                    })
                    .catch(error => {
                    })
                }else{
                    this.$toasted.show(this.$t('please_login_first'), { type: 'error' })

                    this.$router.push({name: 'login-register'})
                }
            },

            buyNow (event) {
                this.is_buy_now = 1;
                this.validateBeforeSubmit();
            },

            changeSlideImage (Image) {
                this.sliderActiveImage = Image;
            },

            stripTags(html) {
                const div = document.createElement("div");
                div.innerHTML = html;

                return div.textContent || div.innerText || "";
            },

            truncateHtml(html, maxWords) {
                const text = this.stripTags(html);
                const words = text.split(' ');

                if (words.length <= maxWords) {
                    return html ;
                }

                // Get the truncated text
                const truncatedText = html.slice(0, maxWords) + '...';

                // Return the truncated text inside a <p> tag or modify as needed
                return `<p>${truncatedText}</p>`;
            },

            toggleShowMore() {
              this.showMore = !this.showMore;
            },
        }
    }
</script>

<style lang="scss">
    .product-description p{
        margin-top:15px;
    }

    .schedule-visit svg{
        width:28px;
    }
</style>
