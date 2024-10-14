<template>
	<div>
		<!-- breadcrumb -->
		<breadcrumb :links="breadcrumbLinks" ></breadcrumb>
		<!-- breadcrumb end -->

		<section class="pt-6">
			<div class="scrollbar-hide w-full overflow-x-auto pl-4">
				<div class="flex w-max items-center gap-[26px]">
					<a href="#" class="rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-2 py-2 text-[17px] font-medium text-white">All</a>
					<a href="#" class="px-2 py-2 text-[16px] font-normal text-dark">Elanvital</a>
					<a href="#" class="px-2 py-2 text-[16px] font-normal text-dark">Everyhome</a>
					<a href="#" class="px-2 py-2 text-[16px] font-normal text-dark">Extraordinary</a>
				</div>
			</div>
			<div class="container">
				<div class="mt-6 grid grid-cols-2 gap-[14px]">
					<news-card v-for="(news, index) in newses" :key="index" :news="news" :textTruncate="175"></news-card>
				</div>
			</div>
		</section>
	</div>
</template>

<script>

	import newsCard from './card';
	import Breadcrumb from "../common/breadcrumb";
    import { mapState, mapActions } from 'vuex';

    export default {
        name: 'newses',

		components: {
			Breadcrumb,
			newsCard,
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
						'name': 'Celebrations',
					},
				],
				newses:[],
			}
        },

        mounted () {
			this.getNews();
        },

        methods: {
			async getNews(){
                EventBus.$emit('show-ajax-loader');

                const response = await this.$http.get("/api/pwa/news-list", {params: {limit: 10}});

                if (response.data.data) {
                    this.newses = response.data.data
                }

                EventBus.$emit('hide-ajax-loader');
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
