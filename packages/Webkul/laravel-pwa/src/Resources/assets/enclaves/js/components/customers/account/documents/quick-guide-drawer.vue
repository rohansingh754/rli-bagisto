<template>
	<section class="pt-9 pb-9">
		<div class="container">
			<img :src="themeAssets + 'images/quick-guide.png'" alt="" class="mx-auto max-w-56">
			<h2 class="font-bold text-[30px] text-center text-dark">Upload Documents </h2>
			<p class="mt-10 font-bold text-[16px] text-dark">Please upload the following docs:</p>
			<div class="bg-[#F3F4F6] mt-4 p-5 rounded-[20px]">
				<ol class="list-decimal list-inside">
					<li class="font-normal text-[14px] text-dark"> 2 Government ID </li>
					<li class="font-normal text-[14px] text-dark"> Original Certificate of Employment with Compensation </li>
					<li class="font-normal text-[14px] text-dark"> One (1) Month Latest Original and HR-Certified Payslip </li>
					<li class="font-normal text-[14px] text-dark"> Updated/Latest Employee’s Statement of Accumulated(ESAV) </li>
					<li class="font-normal text-[14px] text-dark"> Birth Certificate </li>
					<li class="font-normal text-[14px] text-dark"> 4 pcs. of 1x1 Photo with White Background </li>
					<li class="font-normal text-[14px] text-dark"> Proof of Billing Address </li>
					<li class="font-normal text-[14px] text-dark"> Proof of Billing Address </li>
					<li class="font-normal text-[14px] text-dark"> Letter of Consent/Authorization of BUyer </li>
				</ol>
			</div>
			<ul class="mt-7 list-disc list-inside">
				<li class="font-normal text-[14px] text-primary">Please upload each file with a maximum size of 15MB.</li>
				<li class="font-normal text-[14px] text-primary">We only accept PNG, JPEG, and PDF file formats.</li>
				<li class="font-normal text-[14px] text-primary">Further documentation may be necessary depending on the buyer's status.</li>
			</ul>
				<span
					@click="handelDrawerRedirect()"
					class="block bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] mx-auto mt-7 px-[7 py-5 rounded-full w-3/4 font-medium text-[14px] text-center text-white">
					{{'I Agree & Continue'}}
				</span>
		</div>
	</section>
</template>

<script>


    export default {
        name: 'quick-guide-drawer',

		data() {
			return {
                themeAssets: window.config.themeAssetsPath,
			}
		},

		mounted() {
			let this_this = this;
		},

        methods: {

			handelDrawerRedirect() {
                EventBus.$emit('drawer-up-toggle');

				this.$router.push('/customer/account/documents');
            }
        }
    }
</script>

<style lang="scss">
	.ask-joy-step-3 svg{
		width: 15px;
	}
</style>
