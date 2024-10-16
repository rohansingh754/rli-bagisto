<template>
	<div class="content simmer-container">
	<!-- header -->
	<header-shimmer></header-shimmer>
	<!-- header end-->

	<!-- breadcrumb -->
	 <section class="pt-[25px]">
		<div class="container">
			<div class="font-popins flex justify-start">
				<div class="flex items-center gap-x-[10px]">
					<p class="flex items-center gap-x-[10px] text-[12px] font-medium text-dark shimmer w-[150px] h-[18px]">
					</p>

				</div>
			</div>
		</div>
	 </section>
	<!-- breadcrumb end -->

	<!-- posts -->
	<section class="pt-6">
		<div class="scrollbar-hide w-full overflow-x-auto pl-4">
			<p class="flex items-center gap-x-[10px] text-[12px] font-medium text-dark shimmer w-[100px] h-[18px]">
			</p>
		</div>
		<div class="container">
			<div class="mt-6 grid grid-cols-2 gap-[14px]">
				<div class="slide-card w-[184px]">
					<div class="w-full rounded-[20px] shimmer h-[151px]"></div>
					<div class="mt-3 text-center text-[14px] font-normal text-primary underline shimmer w-[67px] h-[15px]"></div>

					<div class="mt-2 text-center text-[14px] font-normal text-primary underline shimmer w-[67px] h-[15px]"></div>

            		<button class="mt-6 inline-block w-full rounded-[20px] border-[1px] shimmer w-[67px] h-[37px]"></button>
				</div>
				<div class="slide-card w-[184px]">
					<div class="w-full rounded-[20px] shimmer h-[151px]"></div>
					<div class="mt-3 text-center text-[14px] font-normal text-primary underline shimmer w-[67px] h-[15px]"></div>

					<div class="mt-2 text-center text-[14px] font-normal text-primary underline shimmer w-[67px] h-[15px]"></div>

            		<button class="mt-6 inline-block w-full rounded-[20px] border-[1px] shimmer w-[67px] h-[37px]"></button>
				</div>
				<div class="slide-card w-[184px]">
					<div class="w-full rounded-[20px] shimmer h-[151px]"></div>
					<div class="mt-3 text-center text-[14px] font-normal text-primary underline shimmer w-[67px] h-[15px]"></div>

					<div class="mt-2 text-center text-[14px] font-normal text-primary underline shimmer w-[67px] h-[15px]"></div>

            		<button class="mt-6 inline-block w-full rounded-[20px] border-[1px] shimmer w-[67px] h-[37px]"></button>
				</div>
				<div class="slide-card w-[184px]">
					<div class="w-full rounded-[20px] shimmer h-[151px]"></div>
					<div class="mt-3 text-center text-[14px] font-normal text-primary underline shimmer w-[67px] h-[15px]"></div>

					<div class="mt-2 text-center text-[14px] font-normal text-primary underline shimmer w-[67px] h-[15px]"></div>

            		<button class="mt-6 inline-block w-full rounded-[20px] border-[1px] shimmer w-[67px] h-[37px]"></button>
				</div>
				<div class="slide-card w-[184px]">
					<div class="w-full rounded-[20px] shimmer h-[151px]"></div>
					<div class="mt-3 text-center text-[14px] font-normal text-primary underline shimmer w-[67px] h-[15px]"></div>

					<div class="mt-2 text-center text-[14px] font-normal text-primary underline shimmer w-[67px] h-[15px]"></div>

            		<button class="mt-6 inline-block w-full rounded-[20px] border-[1px] shimmer w-[67px] h-[37px]"></button>
				</div>
			</div>
		</div>
	 </section>
	<!-- posts end -->

	<!-- footer  -->
	<footer-shimmer></footer-shimmer>
	<!-- end footer  -->
	</div>
</template>

<script>
	import HeaderShimmer from "./header-shimmer";
	import FooterShimmer from "./footer-shimmer";

    export default {
		name: 'product-list-shimmer',

		components: {
			HeaderShimmer,
			FooterShimmer,
		}
    }
</script>

<style lang="scss">
	.simmer-container{
		background-color: white;
		z-index: 999;
		position: absolute;
		width: 100%;
		height: fit-content;
		overflow-y: scroll;
	}
</style>
