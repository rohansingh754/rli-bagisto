<template>
	<div class="slide-card w-[155px]">
        <div class="max-w-40 max-h-32">
		    <img :src="news.base_image" alt="Affiliate Marketer" class="w-full max-h-32 max-w-40 rounded-[20px]">
        </div>
		<p class="mt-3 text-[14px] font-bold text-dark">{{truncateText(stripTags(news.short_description), 75)}}</p>

        <router-link :to="'/newses/' + news.id">
			<button class="mt-3 inline-block text-center text-[14px] font-normal text-primary underline">{{ $t('Read more') }}
            </button>
		</router-link>
	</div>
</template>

<script>

    import {
        mapState,
        mapActions
    } from 'vuex';

    export default {
        name: 'news-card',

        props: ['news', 'textTruncate'],

		data: function () {
			return {
                themeAssets: window.config.themeAssetsPath,
			}
        },

        mounted () {
        },

        methods: {
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
<style>
    .slide-card img {
        width: 100%;
        max-width: 140px;
        max-height: 132px;
    }
</style>
