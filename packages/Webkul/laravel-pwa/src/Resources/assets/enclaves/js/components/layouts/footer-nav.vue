<template>
    <div>
        <footer
            class="relative pt-[89px]">
            <div class="container">
                <p class="text-[14px] font-bold text-dark">Talk to Us</p>
                <div class="before:contents='' z-10 before:absolute before:bottom-0 before:left-0 before:right-0 before:z-[-1] before:h-[298px] before:bg-cover before:bg-no-repeat">
                    <div class="">
                        <div class="mt-[25px] flex items-center gap-[18px]">
                            <span class="icon-email text-[38px] text-primary"></span>
                            <a class="text-[18px] font-normal text-black"
                                href="mailto:sample@email.com">sample@email.com</a>
                        </div>
                        <div class="mt-[17px] flex items-center gap-[18px]">
                            <span class="icon-contact text-[38px] text-primary"></span>
                            <a class="text-[18px] font-normal text-black" href="phone:+63 9456677654">+63 9456677654</a>
                        </div>
                    </div>
                    <div class="mt-[24px]">
                        <p class="text-[17px] font-bold text-dark"> Talk to Us </p>
                        <div class="mt-4 flex gap-5">
                            <div class="h-fit rounded-full !bg-gradient-to-r from-[#e0165d] to-yellow-500 p-[10px]">
                                <a href="#" alt="facebook">
                                    <img
                                        :src="themeAssets + 'images/facebook.png'"
                                        alt="facebook">
                                </a>
                            </div>
                            <div class="h-fit rounded-full !bg-gradient-to-r from-[#e0165d] to-yellow-500 p-[10px]">
                                <a href="#" alt="instagram">
                                    <img
                                        :src="themeAssets + 'images/insta.png'"
                                        alt="instagram">
                                </a>
                            </div>
                            <div class="h-fit rounded-full !bg-gradient-to-r from-[#e0165d] to-yellow-500 p-[10px]">
                                <a href="#" alt="youtube">
                                    <img
                                        :src="themeAssets + 'images/youtube.png'"
                                        alt="youtube" class="my-[4px]">
                                </a>
                            </div>
                            <div class="h-fit rounded-full !bg-gradient-to-r from-[#e0165d] to-yellow-500 p-[10px]">
                                <a href="#" alt="tiktok">
                                    <img
                                        :src="themeAssets + 'images/tiktok.png'"
                                        alt="tiktok">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="mt-5 bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] py-5">
                <div class="container">
                    <p class="text-[12px] font-medium text-white"> © Copyright 2024 - 2025, Homeful.<br>
                        All rights reserved.</p>
                </div>
            </div>
        </footer>
        <div class="footer">
            <span class="sepator"></span>

            <p>{{ $t('You have just reached to the bottom of page.') }}</p>

            <a @click.prevent="backToTop">{{ $t('Back To Top') }}</a>
        </div>
    </div>

</template>

<script>
    export default {
        name: 'footer-nav',

        data: function () {
			return {
                themeAssets: window.config.themeAssetsPath,
			}
        },

        methods: {
            backToTop () {
                $("html, body").animate({scrollTop: 0}, 1000);
            },

            getTranslates () {
                EventBus.$emit('show-ajax-loader');

                var address = 'enclaves::app.shop.components.layouts.footer.address';
                var email = 'enclaves::app.shop.components.layouts.footer.email';
                var mobileNumber = 'enclaves::app.shop.components.layouts.footer.mobile-number';

                const translateKeys = [
                    address,
                    email,
                    mobileNumber,
                ];

                this.$http.get("/api/v1/core-configs", {
                    params: {
                        _translate: translateKeys
                    }
                }).then(response => {

                    EventBus.$emit('hide-ajax-loader');

                })
                .catch(error =>  {
                    console.error(error);
                });
            },
        }
    }
</script>

<style lang="scss">
    .footer {
        padding: 10px 0;
        text-align: center;

        .sepator {
            display: inline-block;
            border-bottom: 1px solid #F5F5F5;;
            width: 100px;
            margin-bottom: 10px;
        }

        p {
            font-size: 10px;
            margin-bottom: 10px;
            color: #757575;
        }

        a {
            font-size: 10px;
            color: #000000;
            text-transform: uppercase;
            cursor:pointer;
        }
    }
</style>
