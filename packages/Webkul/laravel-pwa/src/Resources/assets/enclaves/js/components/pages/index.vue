<template>
    <div>
    <!-- breadcrumb -->
		<breadcrumb :links="breadcrumbLinks" ></breadcrumb>
	<!-- breadcrumb end -->

	<page-view :slug="slug"></page-view>

	<div class="panel" style="margin-bottom: 0">
            <div class="panel-content">
                <footer-nav></footer-nav>
            </div>
        </div>
	</div>
</template>

<script>

	import FooterNav              from '../layouts/footer-nav';
	import PageView               from './page-view';
    import Breadcrumb             from "../common/breadcrumb";
    import {mapState, mapActions} from 'vuex';

    export default {
        name: 'page',

		components: {
            FooterNav,
			PageView,
            Breadcrumb
        },

        props: ['page'],

		data: function () {
			return {
                themeAssets: window.config.themeAssetsPath,
				slug:'about-us',
                breadcrumbLinks:[
                    {
						'name': 'Home',
						'redirect':'/'
					},
					{
						'name': 'Page',
					},
                ],
			}
        },

        mounted () {
			this.slug = this.$route.params.slug;

            if (this.slug === 'about-us') {
                this.breadcrumbLinks[this.breadcrumbLinks.length - 1].name = 'About Us';
            } else if(this.slug === 'contact-us'){
                this.breadcrumbLinks[this.breadcrumbLinks.length - 1].name = 'Task to Us';
            } else if(this.slug === 'join-us'){
                this.breadcrumbLinks[this.breadcrumbLinks.length - 1].name = 'Join Us';
            } else if(this.slug === 'support'){
                this.breadcrumbLinks[this.breadcrumbLinks.length - 1].name = 'Support';
            }
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
