<template>
    <div class="content">
        <section class="pt-6">
            <div class="container">
                <h1 class="text-[17px] font-medium text-dark">
                    <router-link :to="'/'"> Homepage </router-link> / <span class="text-text-gray"> My Property </span>

                </h1>
                <div class="property-card active group mt-4 border-b border-[#E9E9E9] pb-5">
                    <div class="accordian-toggle flex cursor-pointer items-center">
                        <p class="mr-auto text-[15px] font-medium text-text-gray">My Property</p>
                        <p class="mr-2 text-[15px] font-medium text-text-gray">Ref. Code: JN-091-22</p>
                        <span class="icon-arrow-down text-[28px] text-primary group-[:not(.active)]:rotate-180"></span>
                    </div>
                    <div class="mt-4 flex items-center gap-5">
                        <img :src="themeAssets + 'images/hero-thumbnail-1.png'" alt="" class="w-[84px]">
                        <div class="mr-auto">
                            <p class="text-[14px] font-semibold text-dark">Agapeya Towns Graceful Pink</p>
                            <p class="text-[14px] font-semibold text-dark">₱2,500,000</p>
                            <p class="text-[12px] font-normal text-text-gray">Total Contract Price</p>
                        </div>
                        <a href="#" class="text-[14px] font-semibold text-primary underline">Details</a>
                    </div>
                    <div class="mt-3 group-[:not(.active)]:hidden">
                        <p class="text-[13px] font-medium text-text-gray">Home Loan Status</p>
                        <div class="mt-5">
                            <div class="relative grid grid-cols-4 gap-4 text-center">
                                <div class="text-[12px] font-normal text-[#4CAF50]">
                                    <span class="relative z-10 mx-auto mb-2 flex h-[30px] w-[30px] items-center justify-center rounded-full bg-[#4CAF50]">
                                        <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.5757 0L6.70946 10.862L2.23441 6.39115L0 8.62555L6.70946 15.3392L19.8101 2.2344L17.5757 0Z" fill="#CCFF90"/>
                                        </svg>
                                    </span>
                                    Pre-Qualified</div>
                                <div class="before:content='' relative text-[12px] font-normal text-[#4CAF50] before:absolute before:right-1/2 before:top-3 before:h-1.5 before:w-[120%] before:bg-[#4CAF50]">
                                    <span class="relative z-10 mx-auto mb-2 flex h-[30px] w-[30px] items-center justify-center rounded-full bg-[#4CAF50]">
                                        <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.5757 0L6.70946 10.862L2.23441 6.39115L0 8.62555L6.70946 15.3392L19.8101 2.2344L17.5757 0Z" fill="#CCFF90"/>
                                        </svg>
                                    </span>
                                    Qualified for Uploading</div>
                                <div class="before:content='' relative text-[12px] font-normal text-[#C38400] before:absolute before:right-1/2 before:top-3 before:h-1.5 before:w-[120%] before:bg-[linear-gradient(268.1deg,_#FCB115_7.47%,_#4CAF50_98.92%)]">
                                    <span class="relative z-10 mx-auto mb-2 flex h-[30px] w-[30px] items-center justify-center rounded-full bg-[#FCB115]">
                                        <img :src="themeAssets + 'images/right.png'" alt="" class="brightness-[20]">
                                    </span>
                                    Qualified for Signing</div>
                                <div class="before:content='' relative text-[12px] font-normal text-[#A0A0A0] before:absolute before:right-1/2 before:top-3.5 before:w-[120%] before:border-b before:border-dashed before:border-[#A0A0A0]">
                                    <span class="relative z-10 mx-auto mb-2 block h-[30px] w-[30px] rounded-full bg-[#A0A0A0]"></span>
                                    Approved</div>
                            </div>
                        </div>
                        <p class="mt-6 text-[13px] font-medium text-text-gray">Documents</p>
                        <div class="mt-3 grid grid-cols-3 gap-3">
                            <div class="rounded-[20px] bg-[#F6FAFF] p-3">
                                <p class="text-[27px] font-medium text-dark">25</p>
                                <p class="text-[12px] font-normal text-[#6A6A6A]">For Uploading</p>
                                <a href="#" class="text-[10px] font-normal text-primary">View</a>
                            </div>
                            <div class="rounded-[20px] bg-[#F6FAFF] p-3">
                                <p class="text-[27px] font-medium text-dark">0</p>
                                <p class="text-[12px] font-normal text-[#6A6A6A]">For Approval</p>
                                <a href="#" class="text-[10px] font-normal text-primary">View</a>
                            </div>
                            <div class="rounded-[20px] bg-[#F6FAFF] p-3">
                                <p class="text-[27px] font-medium text-dark">0</p>
                                <p class="text-[12px] font-normal text-[#6A6A6A]">For Re-upload</p>
                                <a href="#" class="text-[10px] font-normal text-primary">View</a>
                            </div>
                            <div class="rounded-[20px] bg-[#F6FAFF] p-3">
                                <p class="text-[27px] font-medium text-dark">0</p>
                                <p class="text-[12px] font-normal text-[#6A6A6A]">For Signing</p>
                                <a href="#" class="text-[10px] font-normal text-primary">View</a>
                            </div>
                            <div class="rounded-[20px] bg-[#F6FAFF] p-3">
                                <p class="text-[27px] font-medium text-dark">0</p>
                                <p class="text-[12px] font-normal text-[#6A6A6A]">Signed Docs</p>
                                <a href="#" class="text-[10px] font-normal text-primary">View</a>
                            </div>
                        </div>
                        <div class="mt-8 grid w-full grid-cols-2 items-center gap-2">
                            <span
                                class="block rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-6 py-4 text-center text-[14px] font-medium text-white"
                                @click="handleToggleDrawerUP('quickGuide')"
                                >
                                Go to my Documents
                            </span>
                            <router-link :to="'/customer/account/support'">
                                <span class="block rounded-full border border-primary px-6 py-4 text-center text-[14px] font-medium text-primary">Contact Support</span>
                            </router-link>
                        </div>
                        <div class="mt-5 rounded-[24px] bg-[#DBEBFF] px-7 py-5 text-[14px] font-normal text-[#1973E8]">
                            Please upload all required documents by <strong>June 27, 2024</strong> to confirm your booking. Otherwise, your chosen property may be allocated to another buyer. Contact our support team with any questions.
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>

    import {mapState, mapActions} from 'vuex'

    export default {
        name: 'my-properties',

        components: {
        },

        data: function () {
			return {
                themeAssets: window.config.themeAssetsPath,
			}
        },

        computed: mapState({
            customer: state => state.customer,
        }),

        mounted () {
            this.getCustomer();
        },

        methods: {
            ...mapActions([
                'getCustomer',
            ]),

            handleToggleDrawerUP(key) {
                EventBus.$emit('drawer-up-toggle-popup', key);
            },
        }
    }
</script>
