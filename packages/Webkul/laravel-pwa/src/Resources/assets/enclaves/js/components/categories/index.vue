<template>
    <div>
    <!-- breadcrumb -->
	<breadcrumb :links="breadcrumbLinks" ></breadcrumb>
	<!-- breadcrumb end -->

    <section class="mt-3">
        <div class="container">
            <div class="flex items-center justify-between gap-4 rounded-[20px] border border-[#D9D9D9] px-5 py-2 max-385:gap-2 max-385:px-3">
                <img :src="themeAssets + 'images/elanvital-product.png'" alt="" class="max-w-[90px]">
                <a href="#" class="text-[12px] font-medium text-primary underline">Store Details</a>
            </div>
        </div>
    </section>

	<!-- posts -->
	<section class="pt-6">
		<div class="scrollbar-hide w-full overflow-x-auto pl-4 text-dark text-[18px]">
			Projects
		</div>
		<div class="container">
			<div class="mt-6 grid grid-cols-2 gap-[14px] ">
				<product-card
                    v-for="(product, index) in products" :key="index"
                    :product="product"
                    >
                </product-card>
			</div>
		</div>
	 </section>
	<!-- posts end -->
    </div>
</template>

<script>
	import Breadcrumb from "../common/breadcrumb";
    import ProductCard from "../products/card";

    export default {
        name: 'category',

        components: {
			Breadcrumb,
            ProductCard,
		},

        data: function () {
			return {
                themeAssets: window.config.themeAssetsPath,
                products:[],
                breadcrumbLinks:[
					{
						'name': 'Home',
						'redirect':'/'
					},
					{
						'name': 'Categories',
						'redirect':'/categories'
					},
					{
						'name': 'Category',
					},
				],

                categoryId: this.$route.params.id,
			}
        },

        async mounted() {
           await this.getCategory();
           await this.getCategoryProducts();
        },

        methods: {
            async getCategory(){
                const response = await this.$http.get("/api/v1/categories/" + this.categoryId);
                if (response.data.data) {
                    this.breadcrumbLinks[this.breadcrumbLinks.length - 1].name = response.data.data.name;
                }
            },

            async getCategoryProducts() {
                try {
                    EventBus.$emit('show-ajax-loader');

                    this.products = await this.getProducts({ 'category_id': this.categoryId, 'limit': 20 });

                    EventBus.$emit('hide-ajax-loader');
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
