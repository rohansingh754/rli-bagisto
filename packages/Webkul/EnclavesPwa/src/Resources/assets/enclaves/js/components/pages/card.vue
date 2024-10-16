<template>
    <section class="pt-[26px]" id="about">
		<div class="container">
			<h2 class="text-[20px] font-bold text-dark">{{page.page_title}}</h2>
			<img :src="themeAssets + 'images/about-homeful.png'" alt="About Homeful" class="mt-[25px] w-[100%] rounded-[20px]">
			<p class="mt-[25px] text-[15px] font-normal text-dark">
				{{truncateText(stripTags(page.html_content), textTruncate)}}
			</p>
            <router-link :to="'/pages/' + page.url_key">
			    <p class="text-[15px] font-bold text-dark">{{ $t('Read More') }}
                </p>
            </router-link>
		</div>
	</section>
</template>

<script>

    import {
        mapState,
        mapActions
    } from 'vuex';

    export default {
        name: 'page-card',

        props: ['pageData', 'textTruncate'],

		data: function () {
			return {
                themeAssets: window.config.themeAssetsPath,
                page:{},
			}
        },

        mounted () {
            this.page = this.pageData.data;
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
