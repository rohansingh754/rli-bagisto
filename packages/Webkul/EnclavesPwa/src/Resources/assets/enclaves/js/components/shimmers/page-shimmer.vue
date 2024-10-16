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

	<!-- section about -->
	 <section class="pt-[25px]">
		<div class="container">
			<div class="shimmer w-[100%] h-[237px] rounded-[20px]"> </div>
			<h2 class="mt-[30px] shimmer w-[150px] h-[25px] rounded-[20px]"></h2>
			<p class="mt-[23px] shimmer w-full h-[500px] rounded-[20px]"></p>
		</div>
	 </section>
	<!-- section about end -->
	<!-- footer  -->
	<footer-shimmer></footer-shimmer>
	<!-- end footer  -->
    </div>

</template>

<script>
	import HeaderShimmer from "./header-shimmer";
	import FooterShimmer from "./footer-shimmer";

    export default {
		name: 'page-shimmer',

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
