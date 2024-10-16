<template>
	<div>
		<!-- breadcrumb -->
		<breadcrumb :links="breadcrumbLinks" ></breadcrumb>
		<!-- breadcrumb end -->

		<section class="pt-6">
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
						'name': 'News and Events.',
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
