<template>
    <div>
    <!-- breadcrumb -->
		<breadcrumb :links="breadcrumbLinks" ></breadcrumb>
	<!-- breadcrumb end -->

	<cms-page-view v-if="cmsPage" :page="cmsPage"></cms-page-view>

	<div class="panel" style="margin-bottom: 0">
            <div class="panel-content">
                <footer-nav></footer-nav>
            </div>
        </div>
	</div>
</template>

<script>

	import FooterNav              from '../layouts/footer-nav';
	import CmsPageView            from './cms-page-view';
    import Breadcrumb             from "../common/breadcrumb";
    import {mapState, mapActions} from 'vuex';

    export default {
        name: 'page',

		components: {
            FooterNav,
			CmsPageView,
            Breadcrumb,
        },

		data: function () {
			return {
                themeAssets: window.config.themeAssetsPath,
				slug:null,
                cmsPage: null,
                actionPages:[
                    {
                        'title' : 'Support',
                        'slug'  : 'support',
                    },
                ],
                activeActionPage:{},
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

            this.getPage();
        },

        methods: {
            getPage () {
                EventBus.$emit('show-ajax-loader');

                let isCMSPage = this.isCMSPage();

                if (isCMSPage){

                    this.$http.get('/api/pwa/page/' + this.slug)
                    .then(response => {
                        this.cmsPage = response.data.data;

                        if (this.cmsPage) {
                            this.breadcrumbLinks[this.breadcrumbLinks.length - 1].name = this.cmsPage.page_title;
                        }

                        EventBus.$emit('hide-ajax-loader');
                    })
                    .catch(function (error) {});
                }

            },

			stripTags(html){
                const div = document.createElement("div");
                div.innerHTML = html;
                let text = div.textContent || div.innerText || "";

                return text;
            },

            isCMSPage(){
                this.activeActionPage = this.actionPages.find(item => item.slug === this.slug);

                if (this.activeActionPage) {
                    return false;
                }

                return true;
            },
        }
    }
</script>
