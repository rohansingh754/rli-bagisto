<template>
	<div class="slide-card w-[205px] rounded-[9px] bg-white p-[10px] shadow-[0px_4px_4px] shadow-black/10">
        <img :src="themeAssets + 'images/partner-1.png'" alt="Affiliate Marketer" class="w-full rounded-[8px]">
        <h3 class="mt-[10px] text-[17px] font-bold text-dark">Affiliate Marketer</h3>
        <p class="mt-[10px] text-[14px] font-normal text-dark">Are you looking to boost your income effortlessly? <br><br>
            Join our "Affiliate Marketer" program today! Perfect for digital marketers, social media influencers, housewives and office worker.<br><br>
            Here’s how it works...</p>
        <div class="mt-[10px] flex items-center gap-[2px]">
            <a href="#" class="inline-block rounded-full px-[7px] py-[9px] text-center text-[14px] font-medium text-primary underline">Read more</a>
            <a href="#" class="inline-block rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-[26px] py-[9px] text-center text-[14px] font-medium text-white">Join Us</a>
        </div>
    </div>
</template>

<script>

    import {mapState, mapActions} from 'vuex';

    export default {
        name: 'partner-card',

        props: ['partner', 'textTruncate'],

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
