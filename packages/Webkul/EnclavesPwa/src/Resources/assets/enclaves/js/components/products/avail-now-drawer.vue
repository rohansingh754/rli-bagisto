<template>
	<div class="z-[999] bg-white p-5">
		<div class="flex items-center justify-between gap-2 border-b-[1px] border-[#8B8B8B4D] pb-4">
			<h3 class="text-[20px] font-bold text-dark">{{ $t('Selections') }}
			</h3>
			<span
				class="flex h-[35px] w-[35px] cursor-pointer items-center justify-center rounded-full bg-[#F3F4F6]"
				@click="closeDrawer()"
				>
				<span class="icon-cancel text-[20px] text-[#989898]"></span>
			</span>
		</div>
		<div class="mt-7">
			<div class="flex gap-3 rounded-[22px] bg-[#F0F6FF] p-4">
				<img :src="themeAssets + 'images/property-image.png'" alt="property-image" class="max-w-[96px] rounded-xl">
				<div class="">
					<p class="text-[12px] font-normal text-text-gray">{{ $t('Starts at') }}
					</p>
					<p class="homefull-text-gradient mt-[2px] text-[20px] font-bold leading-5">₱2,700,000</p>
				</div>
			</div>
			<div class="mt-16">
				<p class="text-[16px] font-medium text-dark">{{ $t('Building') }}
				</p>
				<ul class="mt-2 flex w-full flex-wrap gap-x-3 gap-y-2">
					<li>
						<input type="radio" id="hermosa" name="selection" value="Hermosa" class="peer hidden" required />
						<label for="hermosa" class="inline-flex w-full cursor-pointer items-center justify-between rounded-full border border-[#D9D9D9] bg-[#F3F4F6] p-2 text-dark hover:bg-primary hover:text-white peer-checked:border-primary peer-checked:bg-primary peer-checked:text-white dark:border-primary dark:bg-primary dark:text-white dark:hover:bg-primary dark:hover:text-white dark:peer-checked:text-white">
							<div class="text-[14px] font-normal">Hermosa</div>
						</label>
					</li>
					<li>
						<input type="radio" id="balangay" name="selection" value="Balangay" class="peer hidden">
						<label for="balangay" class="inline-flex w-full cursor-pointer items-center justify-between rounded-full border border-[#D9D9D9] bg-[#F3F4F6] p-2 text-dark hover:bg-primary hover:text-white peer-checked:border-primary peer-checked:bg-primary peer-checked:text-white dark:border-primary dark:bg-primary dark:text-white dark:hover:bg-primary dark:hover:text-white dark:peer-checked:text-white">
							<div class="text-[14px] font-normal">Balangay</div>
						</label>
					</li>
				</ul>
				<button type="submit" class="mt-10 inline-block w-full rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-7 py-5 text-center text-[15px] font-medium text-white disabled:opacity-[0.4]" disabled>{{ $t('Continue') }}
				</button>
			</div>
		</div>
	</div>
</template>

<script>

    export default {
        name: 'avail-now-drawer',

		components:{

		},

		data() {
			return {
                themeAssets: window.config.themeAssetsPath,
			}
		},

        methods: {
			closeDrawer(){
				EventBus.$emit('drawer-up-toggle');
			},
        }
    }
</script>

<style lang="scss">
	.schedule-visit-drawer-container svg{
		width: 15px;
	}
</style>
