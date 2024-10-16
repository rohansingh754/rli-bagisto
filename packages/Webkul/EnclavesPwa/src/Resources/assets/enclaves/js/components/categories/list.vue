<template>
	<div>
		<!-- breadcrumb -->
		<breadcrumb :links="breadcrumbLinks" ></breadcrumb>
		<!-- breadcrumb end -->

		<section class="pt-6">
			<div class="scrollbar-hide w-full overflow-x-auto pl-4">
				<div class="flex w-max items-center gap-[26px]">
					<span
						class="rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-2 py-2 text-[17px] font-medium text-white"
						@click="getAllCategories()"
						>
						{{ $t('All') }}
					</span>

					<span
						class="px-2 py-2 text-[16px] font-normal text-dark"
						v-for="(parent_category, index) in parent_categories"
						:key="index"
						@click="getSubCategories(parent_category.id)"
						>
						{{parent_category.name}}
					</span>
				</div>
			</div>
			<div class="container">
				<div class="mt-6 grid grid-cols-2 gap-[14px]">
					<category-card v-for="(category, index) in categories" :key="index" :category="category" :textTruncate="175"></category-card>
				</div>
			</div>
		</section>
	</div>
</template>

<script>

	import CategoryCard from './card';
	import Breadcrumb from "../common/breadcrumb";
    import { mapState, mapActions } from 'vuex';

    export default {
        name: 'categories',

		components: {
			Breadcrumb,
			CategoryCard,
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
						'name': 'Brands',
					},
				],
				categories: [],
				parent_categories:[],
			}
        },

        mounted () {
			this.getAllCategories();
			this.getSubCategories();
        },

        methods: {
			async getSubCategories(parent_category_id = null) {
                try {
					EventBus.$emit('show-ajax-loader');

					if (! parent_category_id ) {
						parent_category_id = window.channel.root_category_id
					};

					const response = await this.$http.get("/api/v1/descendant-categories", { params: { parent_id: parent_category_id } });

					if (window.channel.root_category_id == parent_category_id ) {
						this.parent_categories = response.data.data;
					}

                    this.categories = response.data.data;

                    EventBus.$emit('hide-ajax-loader');

                } catch (error) {
                    console.error(error);
                }
			},

			async getAllCategories() {
                try {
                    EventBus.$emit('show-ajax-loader');

                    const response = await this.$http.get("/api/v1/categories");

					if (response.data.data.length) {
						this.categories = response.data.data.filter(cat => {
							return cat.id != 1;
						});
					}

                    EventBus.$emit('hide-ajax-loader');

                } catch (error) {
                    console.error(error);
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
