<template>
    <div>
		<div class="ask-joy-step-1 rounded-t-[30px] bg-white">
			<div class="overflow-hidden rounded-[30px] bg-[linear-gradient(237.46deg,_#FCB11533_-23.76%,_#E1458A33_44.76%)]">
				<img :src="themeAssets + 'images/ask-joy-2.png'" alt="ask joy">
			</div>
			<div class="mx-auto flex max-w-[289px] flex-col items-center justify-center gap-4 pb-9 pt-[60px] max-sm:pt-[140px]">
				<span
					class="w-full rounded-[100px] bg-[#F7F7F7] py-7 text-center text-[15px] font-normal text-dark"
					@click="updateParams('type', 'house')"
					>
						House & Lot
					</span>
				<span
					class="w-full rounded-[100px] bg-[#F7F7F7] py-7 text-center text-[15px] font-normal text-dark"
					@click="updateParams('type', 'Condominuim')"
					>
					Condominuim
				</span>
				<span
					class="w-full rounded-[100px] bg-[#F7F7F7] py-7 text-center text-[15px] font-normal text-dark"
					@click="updateParams('type', 'all')"
					>
					All Kinds
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
</template>

<script>
    export default {
        name: 'ask-to-joy-step-2',

		data() {
			return {
                themeAssets: window.config.themeAssetsPath,
			}
		},

		mounted() {

		},

        methods: {
			closeAskTojoy(){
                EventBus.$emit('ask-to-joy-update-step');

                EventBus.$emit('drawer-up-toggle');
			},

			updateParams(key, value){
                EventBus.$emit('ask-to-joy-filter-update', key, value);
			}
        }
    }
</script>


