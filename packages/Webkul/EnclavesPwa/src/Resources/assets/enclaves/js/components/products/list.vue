<template>
	<div>
		<!-- breadcrumb -->
		<breadcrumb :links="breadcrumbLinks" ></breadcrumb>
		<!-- breadcrumb end -->
		<section class="mt-6">
			<div class="container">
				<h1 class="text-[20px] font-bold text-dark">{{ $t('Projects') }}
				</h1>
				<div class="mt-4 grid grid-cols-2 gap-[25px]">
					<product-card v-for="(product, index) in products" :key="index" :product="product"></product-card>
				</div>
				<a href="#" class="mt-6 inline-block w-full rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-7 py-5 text-center text-[14px] font-medium text-white">{{ $t('Join Us') }}
				</a>
			</div>
		</section>
	</div>
</template>

<script>

	import Breadcrumb from "../common/breadcrumb";
	import ProductCard from './card';
    import { mapState, mapActions } from 'vuex';

    export default {
        name: 'products',

		components: {
			Breadcrumb,
			ProductCard,
		},

		data: function () {
			return {
                themeAssets: window.config.themeAssetsPath,
				breadcrumbLinks:[
					{
						'name': 'Home',
						'redirect':'/'
					},
					{
						'name': 'Products',
					},
				],
				products:[],
			}
        },

        mounted () {
			this.getProducts();
        },

        methods: {
			async getProducts(){
                EventBus.$emit('show-ajax-loader');

                const response = await this.$http.get("/api/v1/products", {params: {limit: 10}});

                if (response.data.data) {
                    this.products = response.data.data
                }

                EventBus.$emit('hide-ajax-loader');
            },
        }
    }
</script>
