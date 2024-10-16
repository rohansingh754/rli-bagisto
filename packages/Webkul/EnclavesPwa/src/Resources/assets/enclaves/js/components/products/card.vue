<template>
    <div class="">
        <image-component
            :src="product.base_image.small_image_url"
            :alt="product.title"
            :classes="'w-full max-h-32 max-w-40 rounded-[20px]'"
            >
        </image-component>


        <p class="mt-4 text-[14px] font-bold text-dark">
            {{product.title}}
        </p>
        <p class="mt-3 text-[12px] font-normal text-text-gray">
            {{ $t('Starts at') }}

        </p>
        <p class="mt-1 text-[12px] font-bold text-dark">
            {{product.formatted_price}}
        </p>
        <router-link :to="'/products/' + product.id">
            <button class="mt-6 inline-block w-full rounded-[20px] border-[1px] border-primary px-6 py-2 text-center text-[14px] font-medium text-primary">{{ $t('View Property') }}
            </button>
        </router-link>
    </div>
</template>

<script>
    import ImageComponent         from "../common/image-component";
    import {mapState, mapActions} from 'vuex';


    export default {
        name: 'product-card',

        components:{
            ImageComponent,
        },

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
        }
    }
</script>
