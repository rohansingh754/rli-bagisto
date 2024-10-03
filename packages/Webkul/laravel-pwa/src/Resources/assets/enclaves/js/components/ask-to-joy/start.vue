<template>
    <div class="ask-joy-step-1-parent">
		<div class="ask-joy-step-1 rounded-t-[30px] bg-white">
			<div class="overflow-hidden rounded-[30px] bg-[linear-gradient(237.46deg,_#FCB11533_-23.76%,_#E1458A33_44.76%)]">
				<img :src="themeAssets + 'images/ask-joy-1.png'" alt="ask joy">
			</div>
			<div class="flex items-center justify-center gap-[14px] pb-9 pt-[174px]">
				<span
					class="flex h-[59px] w-[59px] cursor-pointer items-center justify-center rounded-full bg-[#F3F4F6]"
					@click="closeAskTojoy()"
					>
					<span class="icon-cancel text-[20px] text-[#989898]"></span>
				</span>
				<button
					class="rounded-[100px] bg-[#F7F7F7] px-[97px] py-7 text-[15px] font-normal text-dark"
					@click="incrementStep()"
					>
					Start
				</button>
			</div>
		</div>
	</div>
</template>

<script>
    export default {
        name: 'ask-to-joy-start',

		data() {
			return {
                themeAssets: window.config.themeAssetsPath,
			}
		},

		mounted() {

		},

        methods: {
			closeAskTojoy(){
				this.$emit('closeAskTojoy');
			}
        }
    }
</script>


