<template>
    <div class="rounded-[9px] p-3 shadow-[0px_4px_4px] shadow-black/10">
        <div class="w-full flex justify-center">
            <img
                :src="product.base_image.small_image_url ? product.base_image.small_image_url : '/themes/pwa/default/build/assets/images/category-image.png'"
                alt="elenvital"
                class="w-full max-h-32 max-w-40 rounded-[20px]"
                />
        </div>
        <div class="mt-5 min-h-[58px]">
            <p class="text-[9px] font-bold text-[#343064]">
                {{product.name}}
            </p>
            <p class="mt-2 text-[9px] text-[#343064]">
                Start At
            </p>
            <p class="mt-2 text-[9px] font-bold text-[#343064]">
                {{product.formatted_price}}
            </p>
        </div>

        <router-link :to="'/products/' + product.id">
            <button class="mt-5 inline-block w-full rounded-full border-[.5px] border-primary px-[5px] py-2 text-center font-poppins text-[7px] font-medium text-primary">View Property</button>
        </router-link>
    </div>
</template>

<script>

    import {
        mapState,
        mapActions
    } from 'vuex';

    export default {
        name: 'product-card',

        props: ['product', 'isCustomer'],

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
        }
    }
</script>
