<template>
	<div>
    <!-- breadcrumb -->
		<breadcrumb :links="breadcrumbLinks"></breadcrumb>
	<!-- breadcrumb end -->

	<!-- post section -->
	 <section class="pt-6">
		<img :src="news.base_image" alt="" class="w-full">
		<div class="container">
			<h1 class="mt-6 text-[20px] font-bold text-dark"> {{news.name}} </h1>
			<div class="mt-5">
				<p class="text-normal font-mont text-[12px] text-dark">{{ $t('Author:') }}
                 {{news.author}}</p>
				<p class="text-normal mt-1 font-mont text-[12px] text-dark">{{ $t('Date published:') }}
                 {{news.post_date}}</p>
			</div>
			<p class="mt-6 text-[12px] font-normal text-dark">
                {{stripTags(news.description)}}
            </p>
		</div>
	 </section>
	<!-- post section end-->

	<!-- section related post -->
	<section class="pl-4 pt-[76px]">
		<h3 class="text-[14px] font-semibold text-dark">{{ $t('Check out our other news & updates') }}
        </h3>
		<div class="scrollbar-hide mt-7 w-full overflow-auto">
			<div class="flex w-[max-content] gap-[14px]">
				<news-card v-for="(news, index) in newses" :key="index" :news="news" :textTruncate="175"></news-card>
			</div>
		</div>
	 </section>
	<!-- section related post end-->

    <div class="panel" style="margin-bottom: 0">
        <div class="panel-content">
            <footer-nav></footer-nav>
        </div>
    </div>
	</div>
</template>

<script>
	import Breadcrumb             from "../common/breadcrumb";
   	import newsCard               from './card';
    import FooterNav              from '../layouts/footer-nav';
    import {mapState, mapActions} from 'vuex';

    export default {
        name: 'news',

        components:{
            Breadcrumb,
			newsCard,
            FooterNav,
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
                        'redirect': '/newses'
					},
					{
						'name': 'Title',
					},
                ],
                news:{},
                newsId: this.$route.params.id,
                newses: [],
                exceptsIds:[this.$route.params.id],
			}
        },

        mounted () {
            this.getNews();
            this.getnewses();
        },

        methods: {
            async getNews(){
                EventBus.$emit('show-ajax-loader');

                const response = await this.$http.get("/api/pwa/news/" + this.newsId);

                if (response.data.data) {
                    this.news = response.data.data[0]
                    this.breadcrumbLinks[this.breadcrumbLinks.length - 1].name = this.news.name;
                }

                EventBus.$emit('hide-ajax-loader');
            },

            async getnewses(){
                EventBus.$emit('show-ajax-loader');

                const response = await this.$http.get("/api/pwa/news-list", {
                    params: {
                        limit: 10,
                        id: this.newsId,
                    }
                });

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
        }
    }
</script>
