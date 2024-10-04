<template>
    <div>
		<div class="ask-joy-step-1 flex min-h-[80vh] flex-col items-center justify-between gap-[30px] rounded-t-[30px] bg-white">
			<div class="w-full overflow-hidden rounded-[30px] bg-[linear-gradient(237.46deg,_#FCB11533_-23.76%,_#E1458A33_44.76%)]">
				<img :src="themeAssets + 'images/ask-joy-4.png'" alt="ask joy">
			</div>
			<div class="flex w-full max-w-[306px] flex-col items-center justify-center gap-7 pb-9">
				<div class="w-full border-b-[1px] border-[#E2E2E2] pb-5" @click="updateParams(FilterKey, 10)">
					<span class="text-[17px] font-medium text-dark">Starts at 40,500<span class="icon-arrow-right float-right mt-[-4px] flex h-7 w-7 items-center justify-center rounded-full border-[1px] border-[#EDEFF5] text-[24px] text-primary"></span></span>
				</div>
				<div class="w-full border-b-[1px] border-[#E2E2E2] pb-5">
					<span class="text-[17px] font-medium text-dark">Starts at 23,900<span class="icon-arrow-right float-right mt-[-4px] flex h-7 w-7 items-center justify-center rounded-full border-[1px] border-[#EDEFF5] text-[24px] text-primary"></span></span>
				</div>
				<div class="w-full border-b-[1px] border-[#E2E2E2] pb-5">
					<span class="text-[17px] font-medium text-dark">Starts at 19,900<span class="icon-arrow-right float-right mt-[-4px] flex h-7 w-7 items-center justify-center rounded-full border-[1px] border-[#EDEFF5] text-[24px] text-primary"></span></span>
				</div>
				<div class="w-full border-b-[1px] border-[#E2E2E2] pb-5">
					<span class="text-[17px] font-medium text-dark">Starts at 10,400<span class="icon-arrow-right float-right mt-[-4px] flex h-7 w-7 items-center justify-center rounded-full border-[1px] border-[#EDEFF5] text-[24px] text-primary"></span></span>
				</div>
				<div class="w-full border-b-[1px] border-[#E2E2E2] pb-5">
					<span class="text-[17px] font-medium text-dark">Starts at 8,270<span class="icon-arrow-right float-right mt-[-4px] flex h-7 w-7 items-center justify-center rounded-full border-[1px] border-[#EDEFF5] text-[24px] text-primary"></span></span>
				</div>
				<div class="w-full border-b-[1px] border-[#E2E2E2] pb-5">
					<span class="text-[17px] font-medium text-dark">Starts at 3,350<span class="icon-arrow-right float-right mt-[-4px] flex h-7 w-7 items-center justify-center rounded-full border-[1px] border-[#EDEFF5] text-[24px] text-primary"></span></span>
				</div>
				<div class="flex items-center justify-center gap-[19px]">
					<span
						class="flex h-[59px] w-[59px] cursor-pointer items-center justify-center rounded-full bg-[#F3F4F6] shadow-[0px_4px_4px] shadow-black/25"
						@click="decrementStep()"
						>
						<span class="icon-arrow-right-stylish rotate-180 text-[34px] text-[#989898]"></span>
					</span>
					<span
						class="flex h-[59px] w-[59px] cursor-pointer items-center justify-center rounded-full bg-[#F3F4F6] shadow-[0px_4px_4px] shadow-black/25"
						@click="closeAskTojoy()"
						>
						<span class="icon-cancel text-[20px] text-[#989898]"></span>
					</span>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
    export default {
        name: 'ask-to-joy-step-4',

		data() {
			return {
                themeAssets: window.config.themeAssetsPath,
				FilterKey: 'PriceRange',
			}
		},

		mounted() {
			let askToJoy = localStorage.getItem('askToJoy');

			if (askToJoy && askToJoy.typeFilter) {
				this.FilterKey = askToJoy.typeFilter
			}
		},

        methods: {
			decrementStep(){
                EventBus.$emit('ask-to-joy-previous-step');
			},

			closeAskTojoy(){
                EventBus.$emit('drawer-up-toggle');
			},

			updateParams(key, value){
                EventBus.$emit('ask-to-joy-filter-update', key, value);
			},
        }
    }
</script>


