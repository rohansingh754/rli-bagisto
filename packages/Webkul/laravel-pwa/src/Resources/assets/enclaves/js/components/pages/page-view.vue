<template>
    <div>
        <about-us v-if="slug === 'about-us'" :slug="slug"></about-us>

        <join-us v-if="slug === 'join-us'" :slug="slug"></join-us>

        <contact-us v-if="slug === 'contact-us'" :slug="slug"></contact-us>

        <support v-if="slug === 'support'" :slug="slug"></support>
    </div>
</template>

<script>

	import AboutUs                 from './about-us';
	import JoinUs                  from './join-us';
	import ContactUs                  from './contact-us';
	import Support                  from './support';
    import { mapState, mapActions} from 'vuex';

    export default {
        name: 'page-view',

		components: {
			AboutUs,
			JoinUs,
            ContactUs,
            Support,
		},

        props: ['slug'],

		data: function () {
			return {
                themeAssets: window.config.themeAssetsPath,
                page:{},
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

        watch: {
            $route (to, from) {
                window.location.href = window.config.app_base_url + '' + window.config.prefix.replace('/','') + to.fullPath;
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
