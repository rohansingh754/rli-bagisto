<template>
    <div>
		<div class="ask-joy-step-1 flex min-h-[80vh] flex-col items-center justify-between gap-[30px] rounded-t-[30px] bg-white">
			<div class="w-full overflow-hidden rounded-[30px] bg-[linear-gradient(237.46deg,_#FCB11533_-23.76%,_#E1458A33_44.76%)]">
				<img :src="themeAssets + 'images/ask-joy-4.png'" alt="ask joy">
			</div>
			<div class="flex w-full max-w-[306px] flex-col items-center justify-center gap-7 pb-9">
				<div
					v-if="options"
					v-for="(option, index) in options" :key="index"
					class="w-full border-b-[1px] border-[#E2E2E2] pb-5"
					@click="updateParams(FilterKey, option.id)"
					>
					<span class="text-[17px] font-medium text-dark">
						{{ printOptionLables(option) }}
						<span class="icon-arrow-right float-right mt-[-4px] flex h-7 w-7 items-center justify-center rounded-full border-[1px] border-[#EDEFF5] text-[24px] text-primary"></span>
					</span>
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
				options: [],
			}
		},

		mounted() {

			let askToJoyfilterKey = JSON.parse(localStorage.getItem('askToJoyfilterKey'));

			if (askToJoyfilterKey ) {
				this.FilterKey = askToJoyfilterKey
			}
			console.log(askToJoyfilterKey, this.FilterKey);

			this.getAttributes(this.FilterKey);
		},

        methods: {
			async getAttributes(code) {
				const response = await this.$http.get(`/api/pwa/attributes/${code}`);
				console.log(response);

				if (response) {
					this.options = response.data.data.options;
				}
			},

			decrementStep() {
                EventBus.$emit('ask-to-joy-update-step', 'decremnet');
			},

			closeAskTojoy(){
                EventBus.$emit('ask-to-joy-update-step');

                EventBus.$emit('drawer-up-toggle');
			},

			updateParams(key, value) {

				if (key == 'monthly_amortization') {
					value = this.UpdateValueByKey(key, value);
				}

                EventBus.$emit('ask-to-joy-filter-update', key, value);
			},

			UpdateValueByKey(key, id) {
				let selectedOption = this.options.find(option => option.id == id);

				const result = this.options
					.sort((a, b) => Number(a.admin_name) - Number(b.admin_name))
					.filter(item => Number(item.admin_name) >= selectedOption.admin_name)
					.map(item => item.id);

				return result.join();
			},

			printOptionLables(option) {
				let label = option.translations.find(translation => translation.locale === window.config.currentLocale.code)?.label || null;

				if (!label) {
					label = option.admin_name
				}

				return label
			}
        }
    }
</script>


