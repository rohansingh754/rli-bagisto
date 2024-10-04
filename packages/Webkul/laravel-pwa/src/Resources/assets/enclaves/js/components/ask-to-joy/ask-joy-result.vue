<template>
    <div>
	<breadcrumb :links="breadcrumbLinks" >
		<div class="mt-5 text-[12px] font-normal text-dark">
			Filter Results (2): House & Lot - Monthly Budget 19,900
			<span class="fixed right-6 z-[999] top-[96px]" @click="openAskToJoy()">
				<image-component
					:src="themeAssets + 'images/joy-icon.png'"
					:alt="'joy'"
					:class="''"
					>
				</image-component>
			</span>
		</div>
	</breadcrumb>
	<!-- breadcrumb end -->

	<!-- Ask Joy result -->
	 <section class="mt-6">
		<div class="container">
			<h1 class="text-[20px] font-bold text-dark">Projects</h1>
			<div class="mt-4 grid grid-cols-2 gap-[25px]">
				<product-card v-for="(product, index) in products" :key="index" :product="product"></product-card>
			</div>

			<a href="#" class="mt-6 inline-block w-full rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-7 py-5 text-center text-[14px] font-medium text-white">compare</a>
		</div>
	 </section>
	<!-- Ask Joy result end-->
	<div>
		<drawer-up ref="drawerAskToJoy">
			<ask-to-joy ></ask-to-joy>
		</drawer-up>
	</div>
	</div>
</template>

<script>
	import Breadcrumb        from "../common/breadcrumb";
	import ImageComponent    from "../common/image-component";
	import AskToJoy          from '../ask-to-joy/index';
    import DrawerUp          from '../common/drawer-up';
	import ProductCard 		 from '../products/card';

    export default {
		name: 'ask-joy-result',

		components:{
			Breadcrumb,
            ImageComponent,
			AskToJoy,
            DrawerUp,
			ProductCard,
		},

		data() {
			return {
                themeAssets: window.config.themeAssetsPath,
				breadcrumbLinks:[
                    {
						'name': 'Home',
						'redirect':'/'
					},
					{
						'name': 'Ask to Joy',
					},
                ],
				products:[],
			}
		},

		mounted() {
			// Get ask to joy filters
			let askToJoy = localStorage.getItem('askToJoy');

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

			openAskToJoy(){
                EventBus.$emit('drawer-up-toggle');
            },
        }
    }
</script>


