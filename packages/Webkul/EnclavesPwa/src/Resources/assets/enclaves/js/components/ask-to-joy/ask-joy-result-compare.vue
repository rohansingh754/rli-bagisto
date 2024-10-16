<template>
    <div>
	<breadcrumb :links="breadcrumbLinks" ></breadcrumb>
	<!-- breadcrumb end -->

	 <section class="pt-7">
		<div class="relative overflow-hidden text-center">
			<!-- fixed sidebar -->
			 <div class="absolute bottom-0 left-0 top-0 z-10 w-[92px]">
				<div class="flex h-[212px] items-center justify-center border-[1px] border-[#EEEEEE] bg-[#F3F4F6] px-2">
					<p class="text-[12px] font-normal text-dark">{{ $t('Models') }}</p>
				</div>
				<ul class="">
					<li class="flex h-[65px] items-center justify-center overflow-hidden border-[1px] border-[#EEEEEE] bg-[#F3F4F6] px-[6px]">
						<p class="text-[12px] font-normal text-dark">{{ $t('Location') }}</p>
					</li>
					<li class="flex h-[65px] items-center justify-center overflow-hidden border-[1px] border-[#EEEEEE] bg-[#F3F4F6] px-[6px]">
						<p class="text-[12px] font-normal text-dark">{{ $t('Price') }} <br>{{ $t('Starts at') }}</p>
					</li>
					<li class="flex h-[65px] items-center justify-center overflow-hidden border-[1px] border-[#EEEEEE] bg-[#F3F4F6] px-[6px]">
						<p class="text-[12px] font-normal text-dark">{{ $t('Monthly Budget') }}</p>
					</li>
					<li class="flex h-[65px] items-center justify-center overflow-hidden border-[1px] border-[#EEEEEE] bg-[#F3F4F6] px-[6px]">
						<p class="text-[12px] font-normal text-dark">{{ $t('Financing') }}</p>
					</li>
					<li class="flex h-[65px] items-center justify-center overflow-hidden border-[1px] border-[#EEEEEE] bg-[#F3F4F6] px-[6px]">
						<p class="text-[12px] font-normal text-dark">{{ $t('Required') }} <br>{{ $t('Gross Income') }}</p>
					</li>
					<li class="flex h-[65px] items-center justify-center overflow-hidden border-[1px] border-[#EEEEEE] bg-[#F3F4F6] px-[6px]">
						<p class="text-[12px] font-normal text-dark">{{ $t('Product') }} <br>{{ $t('Segment') }}</p>
					</li>
					<li class="flex h-[65px] items-center justify-center overflow-hidden border-[1px] border-[#EEEEEE] bg-[#F3F4F6] px-[6px]">
						<p class="text-[12px] font-normal text-dark">{{ $t('Unit Type') }} <br>({{ $t('finish') }})</p>
					</li>
					<li class="flex h-[65px] items-center justify-center overflow-hidden border-[1px] border-[#EEEEEE] bg-[#F3F4F6] px-[6px]">
						<p class="text-[12px] font-normal text-dark">{{ $t('Floor Area') }}</p>
					</li>
					<li class="flex h-[65px] items-center justify-center overflow-hidden border-[1px] border-[#EEEEEE] bg-[#F3F4F6] px-[6px]">
						<p class="text-[12px] font-normal text-dark">{{ $t('Lot Area') }}</p>
					</li>
					<li class="flex h-[80px] items-center justify-center overflow-hidden border-[1px] border-[#EEEEEE] bg-[#F3F4F6] px-[6px]">
						<p class="text-[12px] font-normal text-dark">{{ $t('Feature') }}</p>
					</li>
				</ul>
			 </div>
			<!-- fixed sidebar end-->
			 <div class="scrollbar-hide overflow-x-auto">
				<ul class="ml-[92px] flex w-max">
					<li
						class="w-[212px]"
						v-for="(product, index) in products" :key="index"
						>
						<div class="flex h-[212px] flex-col items-center justify-center border-[1px] border-[#EEEEEE] bg-[#FAFAFA] px-4 py-4">
							<img :src="product.base_image.small_image_url" alt="Agapeya Towns" class="w-[106px]">
							<p class="mt-3 text-[14px] font-normal text-dark">{{product.name}}</p>
							<a href="#" class="mt-auto text-[14px] font-normal text-primary underline">Avail Now</a>
						</div>
						<ul class="">
							<li class="flex h-[65px] flex-col items-center justify-center overflow-hidden border-[1px] border-[#EEEEEE] bg-[#FAFAFA] px-4 py-4">
								<p class="text-[14px] font-normal text-dark">Calamba, Laguna</p>
							</li>
							<li class="flex h-[65px] flex-col items-center justify-center overflow-hidden border-[1px] border-[#EEEEEE] bg-[#FAFAFA] px-4 py-4">
								<p class="text-[14px] font-normal text-dark">{{product.formatted_price}}</p>
							</li>
							<li class="flex h-[65px] flex-col items-center justify-center overflow-hidden border-[1px] border-[#EEEEEE] bg-[#FAFAFA] px-4 py-4">
								<p class="text-[14px] font-normal text-dark">₱ 19,909</p>
								<p class="text-[10px] font-normal text-dark">30 years to pay <br>at 7% interest rate</p>
							</li>
							<li class="flex h-[65px] flex-col items-center justify-center overflow-hidden border-[1px] border-[#EEEEEE] bg-[#FAFAFA] px-4 py-4">
								<p class="text-[14px] font-normal text-dark">Bank Financing</p>
							</li>
							<li class="flex h-[65px] flex-col items-center justify-center overflow-hidden border-[1px] border-[#EEEEEE] bg-[#FAFAFA] px-4 py-4">
								<p class="text-[14px] font-normal text-dark">₱ 66,363</p>
							</li>
							<li class="flex h-[65px] flex-col items-center justify-center overflow-hidden border-[1px] border-[#EEEEEE] bg-[#FAFAFA] px-4 py-4">
								<p class="text-[14px] font-normal text-dark">MIDDLE - HOUSING</p>
							</li>
							<li class="flex h-[65px] flex-col items-center justify-center overflow-hidden border-[1px] border-[#EEEEEE] bg-[#FAFAFA] px-4 py-4">
								<p class="text-[14px] font-normal text-dark">2-Storey Duplex <br>(standard)</p>
							</li>
							<li class="flex h-[65px] flex-col items-center justify-center overflow-hidden border-[1px] border-[#EEEEEE] bg-[#FAFAFA] px-4 py-4">
								<p class="text-[14px] font-normal text-dark">50 sqm</p>
							</li>
							<li class="flex h-[65px] flex-col items-center justify-center overflow-hidden border-[1px] border-[#EEEEEE] bg-[#FAFAFA] px-4 py-4">
								<p class="text-[14px] font-normal text-dark">70 sqm</p>
							</li>
							<li class="flex h-[80px] flex-col items-center justify-center overflow-hidden border-[1px] border-[#EEEEEE] bg-[#FAFAFA] px-4 py-4">
								<ul class="list-inside list-disc text-left">
									<li class="text-[14px] font-normal text-dark">2-bedroom</li>
									<li class="text-[14px] font-normal text-dark">1-Toilet&Bath </li>
									<li class="text-[14px] font-normal text-dark">1-Carport</li>
								</ul>
							</li>
						</ul>
					</li>
				</ul>
			 </div>
		</div>
	 </section>

	</div>
</template>

<script>
	import Breadcrumb        from "../common/breadcrumb";
	import ImageComponent    from "../common/image-component";
	import ProductCard 		 from '../products/card';

    export default {
		name: 'ask-joy-result-compare',

		components:{
			Breadcrumb,
            ImageComponent,
			ProductCard,
		},

		data() {
			return {
                themeAssets: window.config.themeAssetsPath,
				breadcrumbLinks:[
                    {
						'name': 'Home',
						'redirect':'/ask-joy-result'
					},
					{
						'name': 'Ask to Joy',
						'redirect':'/ask-joy-result'
					},
					{
						'name': 'Comparision',
					}
                ],
				products: [],
				productIds:[]
			}
		},

		mounted() {
			// Get ask to joy filters
			this.productIds = this.$route.query.ids || [];
			this.getProducts();
		},

		created() {
			// Access the query parameter from the route
		},

        methods: {
			async getProducts(){
				EventBus.$emit('show-ajax-loader');

				const response = await this.$http.get("/api/pwa/products/compare", {
					params:
					{
						ids: this.productIds,
					},
				});

                if (response.data.data) {
					this.products = response.data.data
                }

                EventBus.$emit('hide-ajax-loader');
            },
        }
    }
</script>


