<template>
	<!-- section about -->
	 <section class="pt-8">
		<div class="container">
			<h2 class="text-[20px] font-bold text-dark">Talk to Us</h2>
			<p class="mt-1 text-[12px] font-normal text-dark">We're happy to discuss any concerns you have.</p>
			<img :src="themeAssets + 'images/contact.png'" alt="contact" class="mt-4 w-[100%] rounded-[20px]">
		</div>
	 </section>
	<!-- section about end -->
</template>

<script>

    import {
        mapState,
        mapActions
    } from 'vuex';

    export default {
        name: 'contact-us',

        props: ['slug'],

		data: function () {
			return {
                themeAssets: window.config.themeAssetsPath,
                page:{},
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
