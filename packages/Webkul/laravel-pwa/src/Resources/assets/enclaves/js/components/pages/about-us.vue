<template>
	<div>
		<!-- section about -->
		<section class="pt-[25px]">
			<div class="container">
				<img :src="themeAssets + 'images/about-homeful.png'" alt="About Homeful" class="w-[100%] rounded-[20px]">
				<h2 class="mt-[30px] text-[20px] font-bold text-dark">About Homeful</h2>
				<p class="mt-[23px] text-[15px] font-normal text-dark">HOMEFUL is an e-commerce platform that showcases real estate projects in both 	Northern and Southern Luzon. It features a diverse range of properties from developer Raemulan Lands Inc.<br><br>
					This platform offers convenient access to a variety of options for homebuyers, simplifying and streamlining the process of finding their ideal home.<br><br>
					Our mission is to provide Home Solutions to Filipinos, transforming lives through our services.</p>

				<div class="mt-[31px]">
					<img :src="themeAssets + 'images/homefull-logo-large.png'" alt="homeful" class="mx-auto">
				</div>
			</div>
		</section>
		<!-- section about end -->

		<!-- features -->
		<section class="pt-[30px]">
			<div class="container">
				<h2 class="mt-[30px] text-[20px] font-bold text-dark">Our Features</h2>
				<div class="mt-[25px]">
					<p class="pl-[4px] text-[15px] font-bold text-dark"> 1. Property Listings </p>
					<p class="text-[15px] font-normal text-dark">Prospective buyers are informed about the key features of the chosen project. They are given the chance to explore our wide-ranging property portfolio consisting of residential homes and condominiums. </p>
					<p class="mt-[22px] pl-[4px] text-[15px] font-bold text-dark"> 2. Search for Joy  </p>
					<p class="text-[15px] font-normal text-dark">"JOY", our Home Assistant, endeavors to simplify the home selection process and enhance decision making.</p>
					<p class="mt-[22px] pl-[4px] text-[15px] font-bold text-dark"> 3. Partner with us </p>
					<p class="text-[15px] font-normal text-dark">Join our network of sellers and seize the opportunity to generate passive income while expanding your business with our platform.</p>
				</div>
			</div>
		</section>
	</div>
</template>

<script>

    import {
        mapState,
        mapActions
    } from 'vuex';

    export default {
        name: 'about-us',

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
