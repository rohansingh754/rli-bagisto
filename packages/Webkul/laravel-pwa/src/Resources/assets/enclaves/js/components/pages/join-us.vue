<template>
	<div>

	<section class="pt-5">
		<div class="container">
			<img :src="themeAssets + 'images/join-us.png'" alt="" class="w-full rounded-[30px]">
			<h1 class="mt-4 text-[20px] font-bold text-dark">Partner with us</h1>
		</div>
		<div class="homeful-accordian mt-6">
			<div class="bg-[#F3F4F6] px-4 py-3">
				<h2 class="flex items-center justify-between gap-2 text-[20px] font-bold text-[#111827]">Affiliate Marketer <span class="icon-arrow-down rotate-180 text-[24px] text-[#F59E0B]"></span></h2>
			</div>
			<div class="acordian-content p-5">
				<p class="text-[15px] font-normal text-[#0F0E0E]">Are you looking to boost your income effortlessly? <br><br>
					Join our "Affiliate Marketer" program today! Perfect for digital marketers, social media influencers, housewives and office worker.
				</p>
				<h3 class="mt-5 text-[19px] font-bold text-[#0F0E0E]">Here's how it works:</h3>
				<p class="text-[15px] font-normal text-[#0F0E0E]">1. 📣 Simply advertise our provided ads with your personalized link.<br>
					2. 💰 Earn referral income when  your link leads to a successfully property purchases.<br>
					3. 💸 Get as much as 20,000 pesos for every 1,000,000 successful sales! (taxes may apply).<br><br>
					Seize the chance to make money from the comfort of your home or work.  Join us now and start earning while you refer buyers to us!<br><br>
					Interested?
				</p>
				<a href="#" class="mt-3 inline-block w-full rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-7 py-5 text-center text-[15px] font-medium text-white">Join Us</a>
			</div>
		</div>
		<div class="homeful-accordian mt-1">
			<div class="bg-[#F3F4F6] px-4 py-3">
				<h2 class="flex items-center justify-between gap-2 text-[20px] font-bold text-[#111827]">Property Consultant <span class="icon-arrow-down rotate-180 text-[24px] text-[#F59E0B]"></span></h2>
			</div>
			<div class="acordian-content p-5">
				<p class="text-[15px] font-normal text-[#0F0E0E]">Exciting  opportunity for Property Consultants eager to advance your career with us!<br><br>
				Take advantage of our competitive commission rate, generous monthly allowance and rewarding incentives when become part of our team of dynamic Property Consultants.<br><br>
				Market our diverse range of residential units in Cavite, Laguna, Bulacan and Pampanga, which includes house & lot and condominium units; priced between 750,000 to 8,000,000.<br><br>
				Elevate your career with us today and be part of our winning team!<br><br>
				Interested?
				</p>
				<a href="#" class="mt-3 inline-block w-full rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-7 py-5 text-center text-[15px] font-medium text-white">Join Us</a>
			</div>
		</div>
		<div class="homeful-accordian mt-1">
			<div class="bg-[#F3F4F6] px-4 py-3">
				<h2 class="flex items-center justify-between gap-2 text-[20px] font-bold text-[#111827]">Licensed Real Estate Broker <span class="icon-arrow-down rotate-180 text-[24px] text-[#F59E0B]"></span></h2>
			</div>
			<div class="acordian-content p-5">
				<p class="text-[15px] font-normal text-[#0F0E0E]">Great News!
					EARN 5% starting Commission Rate when you accredit with us NOW!
					<br><br>PLUS enjoy generous incentives for high volume sales performance
					<br><br>Be part of our team.<br><br>
					Market our diverse range of residential units in Cavite, Laguna, Bulacan and Pampanga, which includes house & lot and condominium units; priced between 750,000 to 10,000,000.
					<br><br>Join in promoting our exciting projects and help fellow Filipinos find the perfect home.<br><br>Interested?
				</p>
				<a href="#" class="mt-3 inline-block w-full rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-7 py-5 text-center text-[15px] font-medium text-white">Join Us</a>
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
        name: 'join-us',

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
