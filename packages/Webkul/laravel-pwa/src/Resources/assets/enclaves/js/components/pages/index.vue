<template>
    <div>

	<page-view :slug="slug">

	</page-view>
	<!-- features end-->
	<div class="panel" style="margin-bottom: 0">
            <div class="panel-content">
                <footer-nav></footer-nav>
            </div>
        </div>
	</div>
</template>

<script>

	import FooterNav from '../layouts/footer-nav';
	import PageView from './page-view';
    import {
        mapState,
        mapActions
    } from 'vuex';


    export default {
        name: 'page',

		components: {
            FooterNav,
			PageView,
        },

        props: ['page'],

		data: function () {
			return {
                themeAssets: window.config.themeAssetsPath,
				slug:'about-us',
			}
        },

        mounted () {
			this.slug = this.$route.params.slug
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
