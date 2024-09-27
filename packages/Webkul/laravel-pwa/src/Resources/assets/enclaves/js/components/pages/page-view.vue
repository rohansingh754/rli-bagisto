<template>
	<about-us v-if="slug === 'about-us'" :slug="slug"></about-us>

	<join-us v-else-if="slug === 'join-us'" :slug="slug"></join-us>
</template>

<script>

    import {
        mapState,
        mapActions
    } from 'vuex';
	import AboutUs from './about-us';
	import JoinUs from './join-us';

    export default {
        name: 'page-view',

		components: {
			AboutUs,
			JoinUs,
		},

        props: ['slug'],

		data: function () {
			return {
                themeAssets: window.config.themeAssetsPath,
                page:{},
			}
        },

        mounted () {
            console.log('new ' ,this.slug);
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
