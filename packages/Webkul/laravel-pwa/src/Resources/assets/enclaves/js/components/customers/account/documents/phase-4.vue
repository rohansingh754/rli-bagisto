<template>
	<div class="container">
		<div class="mt-3">
			<div class="relative flex h-7 w-full overflow-hidden rounded-full bg-[#BEC5D2]" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
				<div class="rounded-full bg-[#7192F6] transition duration-500" style="width: 10%"></div>
				<p class="absolute inset-0 z-10 pt-[2px] text-center text-[13px] font-normal leading-loose text-white">Completion(0%)</p>
				</div>
		</div>
		<div class="mt-6">
			<p class="text-[16px] font-normal text-dark">Ensure information in all documents generated below are correct. Otherwise contact support for assistance.</p>
			<div class="mt-1 flex w-full items-center justify-center gap-3">
				<span
					class="block rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-6 py-4 text-center text-[14px] font-medium text-white"
					@click="openSignAllDrawer()"
					>
					Sign All
				</span>
				<p class="ext-[16px] text-center font-normal text-dark">or</p>
				<a href="#" class="block rounded-full border border-primary px-6 py-4 text-center text-[14px] font-medium text-primary">Contact Support</a>
			</div>
			<form action="" class="mt-3">
				<div class="custom-upload-button2 uploaded signing relative mt-3.5 overflow-hidden rounded-[20px] bg-[#FBFCFF]">
					<input type="file" name="" id="" class="hide-upload-btn w-full cursor-pointer border-0 bg-transparent px-14 py-12 text-[17px] font-medium leading-none text-transparent">
					<p class="absolute left-14 top-7 text-[17px] font-medium text-dark">1 Company ID</p>
					<p class="absolute left-14 top-14 text-[12px] font-normal text-dark">Valid primary identification (ID) <br>card (Photocopy, back-to-back)</p>
				</div>
			</form>
		</div>
	</div>
</template>

<script>


    export default {
        name: 'document-phase-4',

		data() {
			return {
                themeAssets: window.config.themeAssetsPath,
			}
		},

		mounted() {
			let this_this = this;
		},

        methods: {
			openSignAllDrawer() {
				EventBus.$emit('document-sign-all-toggle');
			},
        }
    }
</script>

