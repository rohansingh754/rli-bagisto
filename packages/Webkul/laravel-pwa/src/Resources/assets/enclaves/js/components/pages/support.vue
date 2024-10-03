<template>
	<div>
	<breadcrumb :links="breadcrumbLinks" ></breadcrumb>

	<section class="pt-6">
		<div class="container">
			<h1 class="text-[20px] font-bold text-dark">Submit a Ticket</h1>
			<div class="mt-11">
				<form action="">
					<div class="relative mt-3 overflow-hidden rounded-full border-[0.5px] border-text-gray">
						<input type="text" name="" id="" placeholder="Reference Code" class="w-full border-0 bg-transparent px-7 py-5 text-[16px] font-normal leading-none text-dark outline-none placeholder:text-[16px] placeholder:font-normal placeholder:text-text-gray">
					</div>
					<div class="relative mt-3 overflow-hidden rounded-full border-[0.5px] border-text-gray">
						<div class="custom-select-trigger cursor-pointer px-7 py-5 text-[16px] font-normal text-text-gray" id="custom-select-trigger">
							<span id="selected-option">Nature of concern</span>
							<div class="pointer-events-none absolute inset-y-0 right-5 flex items-center px-2 text-primary">
								<svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M6.00737 7.48852L0.70486 2.15778C0.0762042 1.52578 0.526452 0.449539 1.41787 0.452863L11.7034 0.491212C12.5783 0.494475 13.0275 1.54038 12.4274 2.17708L7.44178 7.46686C7.05431 7.87796 6.40577 7.88904 6.00737 7.48852Z" fill="#CC035C"/>
								</svg>
							</div>
						</div>
						<input type="hidden" id="selected-value" name="selected-value">
					</div>
					<!-- select options modal -->
					<div class="fixed inset-0 z-50 hidden bg-black bg-opacity-40" id="select-box-option">
						<div class="fixed bottom-0 left-0 right-0 min-h-[428px] rounded-t-[30px] bg-white px-6 py-7">
							<div class="flex items-center justify-between border-b-[1px] border-[#8B8B8B4D] pb-4">
								<h2 class="text-[20px] font-bold text-dark">Nature of Concern</h2>
								<span class="close-select-option flex h-[35px] w-[35px] cursor-pointer items-center justify-center rounded-full bg-[#F3F4F6]">
									<span class="icon-cancel text-[14px] text-[#989898]"></span>
								</span>
							</div>
							<ul id="options-list" class="mt-16">
								<li class="option cursor-pointer border-b-[0.5px] border-text-gray pb-5 text-[16px] font-normal text-text-gray" data-value="Payment">Payment</li>
								<li class="option mt-7 cursor-pointer border-b-[0.5px] border-text-gray pb-5 text-[16px] font-normal text-text-gray" data-value="Consultation">Consultation</li>
								<li class="option mt-7 cursor-pointer border-b-[0.5px] border-text-gray pb-5 text-[16px] font-normal text-text-gray" data-value="Need Sales Assistance">Need Sales Assistance</li>
							</ul>
						</div>
					</div>
					<!-- select options modal end-->
					<div class="relative mt-3 overflow-hidden rounded-[25px] border-[0.5px] border-text-gray">
						<textarea type="text" name="" id="" rows="4" placeholder="Reference Code" class="w-full resize-none border-0 bg-transparent px-7 py-5 text-[16px] font-normal text-dark outline-none placeholder:text-[16px] placeholder:font-normal placeholder:text-text-gray"></textarea>
					</div>
					<div class="custom-upload-button relative mt-3 overflow-hidden rounded-[25px] border-[0.5px] border-text-gray">
						<input type="file" name="" id="" class="hide-upload-btn w-full cursor-pointer border-0 bg-transparent px-7 py-5 text-[16px] font-normal leading-none text-primary">
					</div>
					<button type="submit" class="mt-4 inline-block w-full rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-7 py-5 text-center text-[15px] font-medium text-white disabled:opacity-[0.4]" disabled>Submit</button>
				</form>
			</div>
		</div>
	</section>
	<div class="panel" style="margin-bottom: 0">
		<div class="panel-content">
			<footer-nav></footer-nav>
		</div>
	</div>
	</div>
</template>

<script>
    import Breadcrumb from "../common/breadcrumb";
	import FooterNav              from '../layouts/footer-nav';

    export default {
        name: 'support',

		components:{
			Breadcrumb,
			FooterNav,
		},

		data: function () {
			return {
                themeAssets: window.config.themeAssetsPath,
				breadcrumbLinks:[
                    {
						'name': 'Home',
						'redirect':'/'
					},
					{
						'name': 'Support',
					},
                ],
			}
        },

        mounted () {
        },
    }
</script>
