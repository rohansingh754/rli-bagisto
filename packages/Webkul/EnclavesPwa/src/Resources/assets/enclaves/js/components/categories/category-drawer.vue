<template>
	<div class="z-[999] bg-white p-5">
		<div class="flex justify-between items-center gap-2 border-[#8B8B8B4D] pb-4 border-b-[1px]">
			<h3 class="font-bold text-[20px] text-dark">{{ $t('Store Details') }}</h3>
			<span
				class="flex justify-center items-center bg-[#F3F4F6] rounded-full w-[35px] h-[35px] cursor-pointer"
				@click="closeAskTojoy()"
				>
				<span class="text-[#989898] text-[20px] icon-cancel"></span>
			</span>
		</div>
		<img :src="themeAssets + 'images/eleanvital.png'" alt="image" class="mx-auto mt-7 max-w-[290px]">
		<div class="mt-5 pb-5">
			<p class="font-bold text-[#242424] text-[15px]">Who We Are</p>
			<p class="font-normal text-[#242424] text-[15px]">Elanvital Enclaves, established in 2011, provides quality, family-centered living for middle-income Filipino families through mid-rise condominiums and townhomes, fostering family growth and lasting memories.</p>
			<p class="mt-4 font-bold text-[#242424] text-[15px]">Who We Are</p>
			<p class="font-normal text-[#242424] text-[15px]">Elanvital Enclaves, established in 2011, provides quality, family-centered living for middle-income Filipino families through mid-rise condominiums and townhomes, fostering family growth and lasting memories.</p>
			<p class="mt-4 font-bold text-[#242424] text-[15px]">Who We Are</p>
			<p class="font-normal text-[#242424] text-[15px]">Elanvital Enclaves, established in 2011, provides quality, family-centered living for middle-income Filipino families through mid-rise condominiums and townhomes, fostering family growth and lasting memories.</p>
		</div>
	</div>
</template>

<script>


    export default {
        name: 'category-drawer',

		data() {
			return {
                themeAssets: window.config.themeAssetsPath,
				step:1,
				params: {},
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
        }
    }
</script>

<style lang="scss">
	.ask-joy-step-3 svg{
		width: 15px;
	}
</style>
