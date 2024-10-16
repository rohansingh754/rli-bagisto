<template>
	<div class="schedule-visit-drawer-container z-[999] bg-white p-5">
		<div class="flex justify-between items-center gap-2 border-[#8B8B8B4D] pb-4 border-b-[1px]">
			<h3 class="font-bold text-[20px] text-dark">{{ $t('Schedule a Visit Form') }}
			</h3>
			<span
				class="flex justify-center items-center bg-[#F3F4F6] rounded-full w-[35px] h-[35px] cursor-pointer"
				@click="closeDrawer()"
				>
				<span class="text-[#989898] text-[20px] icon-cancel"></span>
			</span>
		</div>
		<div class="mt-4">
			<form action="">
				<div class="relative bg-[#F6F6F6] px-7 py-[11px] rounded-full overflow-hidden">
					<span class="block font-normal text-[10px] text-text-gray leading-none">
						{{ $t('Nature of Concern') }}
					</span>
					<p class="mt-[6px] font-normal text-[16px] text-dark leading-none">
						{{ $t('Schedule a Visit') }}

					</p>
				</div>
				<div class="relative border-[0.5px] mt-3 px-6 py-[11px] border-text-gray rounded-full overflow-hidden">
					<span class="block ml-1 font-normal text-[10px] text-text-gray leading-none">{{ $t('Project') }}
					</span>
					<select name="" id="" class="border-0 bg-transparent w-full font-normal text-[16px] text-dark appearance-none outline-none">
						<option value="Agapeya Towns" selected>Agapeya Towns</option>
					</select>
					<div class="right-5 absolute inset-y-0 flex items-center opacity-40 px-2 text-primary pointer-events-none">
						<svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M6.00737 7.48852L0.70486 2.15778C0.0762042 1.52578 0.526452 0.449539 1.41787 0.452863L11.7034 0.491212C12.5783 0.494475 13.0275 1.54038 12.4274 2.17708L7.44178 7.46686C7.05431 7.87796 6.40577 7.88904 6.00737 7.48852Z" fill="#CC035C"/>
						</svg>
					</div>
				</div>
				<div class="relative border-[0.5px] mt-3 px-6 py-[11px] border-text-gray rounded-full overflow-hidden">
					<span class="block ml-1 font-normal text-[10px] text-text-gray leading-none">
						{{ $t('Location') }}
					</span>
					<select name="" id="" class="border-0 bg-transparent w-full font-normal text-[16px] text-dark appearance-none outline-none">
						<option value="Agapeya Towns" selected>Calamba, Laguna</option>
					</select>
					<div class="right-5 absolute inset-y-0 flex items-center opacity-40 px-2 text-primary pointer-events-none">
						<svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M6.00737 7.48852L0.70486 2.15778C0.0762042 1.52578 0.526452 0.449539 1.41787 0.452863L11.7034 0.491212C12.5783 0.494475 13.0275 1.54038 12.4274 2.17708L7.44178 7.46686C7.05431 7.87796 6.40577 7.88904 6.00737 7.48852Z" fill="#CC035C"/>
						</svg>
					</div>
				</div>
				<div class="relative border-[0.5px] mt-3 border-text-gray rounded-full overflow-hidden">
					<input type="text" name="" id="" placeholder="Name" class="border-0 bg-transparent px-7 py-5 w-full font-normal placeholder:font-normal text-[16px] text-dark placeholder:text-[16px] placeholder:text-text-gray leading-none outline-none">
				</div>
				<div class="relative border-[0.5px] mt-3 border-text-gray rounded-full overflow-hidden">
					<input type="text" name="" id="" placeholder="Contact Number" class="border-0 bg-transparent px-7 py-5 w-full font-normal placeholder:font-normal text-[16px] text-dark placeholder:text-[16px] placeholder:text-text-gray leading-none outline-none">
				</div>
				<div class="relative border-[0.5px] mt-3 border-text-gray rounded-full overflow-hidden">
					<input type="email" name="" id="" placeholder="Email" class="border-0 bg-transparent px-7 py-5 w-full font-normal placeholder:font-normal text-[16px] text-dark placeholder:text-[16px] placeholder:text-text-gray leading-none outline-none">
				</div>
				<div class="gap-2 grid grid-cols-2 mt-3">
					<div class="relative border-[0.5px] border-text-gray rounded-full overflow-hidden">
						<input type="date" name="" id="" placeholder="Date" class="border-0 bg-transparent px-7 py-5 w-full font-normal placeholder:font-normal text-[16px] text-dark placeholder:text-[16px] placeholder:text-text-gray leading-none outline-none">
					</div>
					<div class="relative border-[0.5px] border-text-gray rounded-full overflow-hidden">
						<input type="time" name="" id="" placeholder="Time" class="border-0 bg-transparent px-7 py-5 w-full font-normal placeholder:font-normal text-[16px] text-dark placeholder:text-[16px] placeholder:text-text-gray leading-none outline-none">
					</div>
				</div>
				<div class="relative border-[0.5px] mt-3 border-text-gray rounded-full overflow-hidden">
					<input type="text" name="" id="" placeholder="Remarks" class="border-0 bg-transparent px-7 py-5 w-full font-normal placeholder:font-normal text-[16px] text-dark placeholder:text-[16px] placeholder:text-text-gray leading-none outline-none">
				</div>
				<div class="flex items-start gap-3 mt-8">
					<input id="link-checkbox" type="checkbox" value="" class="checbox-primary">
					<label for="link-checkbox" class="font-normal text-[#000000E0] text-[14px]">{{ $t('By clicking Submit, you agree to Homeful.phs') }}
					 <a href="#" class="font-bold text-[#000000E0] text-[14px]">{{ $t('Privacy Policy') }}
					 </a> {{ $t('and') }}
					  <a href="#" class="font-bold text-[#000000E0] text-[14px]">{{ $t('Terms of Use.') }}
					 </a></label>
				</div>
				<button type="submit" class="inline-block bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] disabled:opacity-[0.4] mt-4 px-7 py-5 rounded-full w-full font-medium text-[15px] text-center text-white">{{ $t('Submit') }}
				</button>
			</form>
		</div>
	</div>
</template>

<script>

    export default {
        name: 'schedule-visit-drawer',

		components:{

		},

		data() {
			return {
                themeAssets: window.config.themeAssetsPath,
			}
		},

		mounted() {
			let this_this = this;
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
