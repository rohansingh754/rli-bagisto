<template>
	<div class="z-[9999] flex items-end bg-dark/20 transition">
		<div
			class="flex flex-col justify-center items-center"
			v-if="signed"
			>
			<img :src="themeAssets + 'images/document-geenrated.png'" alt="" class="w-full">
		</div>
		<div
			class="w-full rounded-t-[30px] bg-white pb-10 pt-11"
			v-else
			>
			<div class="container">
				<div class="overflow-hidden rounded-[30px] bg-[url('./../images/bg-sign.png')] bg-[length:220px_100px] bg-center bg-no-repeat">
					<img :src="themeAssets + 'images/document-sign.gif'" alt="" class="mx-auto max-w-[220px]">
				</div>
				<h2 class="mt-10 text-[30px] font-bold text-dark">Sign All Documents</h2>
				<p class="mt-5 text-[16px] font-normal text-dark">Complete with a selfie to sign all documents.</p>
				<div class="mt-10 flex items-start gap-3">
					<input id="link-checkbox" type="checkbox" v-model="sign_checkbox" class="checbox-primary"/>
					<label for="link-checkbox" class="text-[12px] font-normal text-[#000000E0]">I confirm that all information in the above documents are accurate and correct.</label>
				</div>
				<button
					type="button"
					class="mt-6 inline-block w-full rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-7 py-5 text-center text-[15px] font-medium text-white disabled:opacity-[0.4]"
					:disabled="!sign_checkbox"
					@click="signConfirm()"
					>Sign Now
				</button>
			</div>
		</div>
	</div>
</template>

<script>
    export default {
        name: 'sign-all-drawer',

		data() {
			return {
                themeAssets: window.config.themeAssetsPath,
				step:1,
				params: {},
				sign_checkbox:0,
				signed:0,
			}
		},

		mounted() {
			let this_this = this;
		},

        methods: {
			closeAskTojoy(){
				EventBus.$emit('drawer-up-toggle');
				this.step = 1;
			},

			signConfirm() {
				this.signed = 1;
			}
        }
    }
</script>
