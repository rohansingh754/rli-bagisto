<template>
    <div class="content simmer-container">
	<!-- header -->
	<header-shimmer></header-shimmer>
	<!-- header end-->

	<!-- featured projects -->
	 <section class="homeful-hero-slider">
		<div class="container">
			<div class="mt-5 flex items-center justify-between">
				<h1 class="text-[20px] font-bold text-dark shimmer w-[139px] h-[28px] rounded-[20px]"></h1>
				<span class="shimmer w-[50px] h-[50px] rounded-[20px]"></span>
			</div>
			<div class="homeful-slider-wrap relative mt-4">
				<div class="homeful-slide active">
					<div class="relative overflow-hidden rounded-[20px] shimmer min-h-[382px]">
					</div>
					<div class="mt-6 flex items-center justify-between gap-[16px]">
						<div class="">
							<p class="shimmer w-[90px] h-[18px] rounded-[20px]"></p>
							<p class="mt-[5px] shimmer w-[105px] h-[20px] rounded-[20px]"></p>
						</div>
						<div class="w-[127px]">
							<p class="shimmer w-[90px] h-[18px] rounded-[20px]"></p>
							<p class="mt-[5px] text-black shimmer w-[105px] h-[18px] rounded-[20px]"></p>
						</div>
						<div class="shimmer w-[84px] h-[33px] rounded-[20px]"></div>
					</div>
					<div class="mt-6">
						<p class="shimmer w-[100px] h-[18px] rounded-[20px]"></p>
						<p class="mt-[5px] shimmer w-full h-[36px] rounded-[20px]"></p>
					</div>
				</div>
			</div>
			<div class="scrollbar-hide mt-6 overflow-auto border-b-[1px] border-[#E2E2E2] pb-[15px]">
				<div class="homeful-slider-thumbs flex w-[max-content] gap-3">
					<div class="thumb shimmer w-[75px] h-[73px] cursor-pointer rounded-[20px]">
						<span class="rounded-[8px] shimmer w-full h-[73px]"></span>
						<p class="mt-[5px] font-normal leading-none text-text-gray transition shimmer w-full h-[12px]"></p>
					</div>
					<div class="thumb shimmer w-[75px] h-[73px] cursor-pointer rounded-[20px]">
						<span class="rounded-[8px] shimmer w-full h-[73px]"></span>
						<p class="mt-[5px] font-normal leading-none text-text-gray transition shimmer w-full h-[12px]"></p>
					</div>
					<div class="thumb shimmer w-[75px] h-[73px] cursor-pointer rounded-[20px]">
						<span class="rounded-[8px] shimmer w-full h-[73px]"></span>
						<p class="mt-[5px] font-normal leading-none text-text-gray transition shimmer w-full h-[12px]"></p>
					</div>
					<div class="thumb shimmer w-[75px] h-[73px] cursor-pointer rounded-[20px]">
						<span class="rounded-[8px] shimmer w-full h-[73px]"></span>
						<p class="mt-[5px] font-normal leading-none text-text-gray transition shimmer w-full h-[12px]"></p>
					</div>
					<div class="thumb shimmer w-[75px] h-[73px] cursor-pointer rounded-[20px]">
						<span class="rounded-[8px] shimmer w-full h-[73px]"></span>
						<p class="mt-[5px] font-normal leading-none text-text-gray transition shimmer w-full h-[12px]"></p>
					</div>
				</div>
			</div>
		</div>
	 </section>
	<!-- featured projects end -->

	<!-- section about -->
	 <section class="pt-[26px]" id="about">
		<div class="container">
			<h2 class="shimmer w-[130px] h-[30px] rounded-[20px]"></h2>
			<div class="mt-[25px] w-[100%] rounded-[20px] shimmer h-60 rounded-[20px]"></div>
			<p class="mt-[25px] rounded-[20px] shimmer w-full h-[60px] rounded-[20px]"></p>
			<p class="mt-2 shimmer w-[130px] h-[22px] rounded-[20px]"><a href="#" ></a></p>
		</div>
	 </section>
	<!-- section about end -->

	<!-- section our brands -->
	 <section class="pt-9">
		<div class="container">
			<h2 class="shimmer w-[130px] h-[30px] rounded-[20px]"></h2>

			<div class="mt-3 grid grid-cols-3 gap-[9px]">
				<div class="rounded-[9px] p-3 shadow-[0px_4px_4px] shadow-black/10">
					<div class="mt-5 shimmer w-[84px] h-[33px] rounded-[20px]"></div>
					<div class="mt-5 min-h-[58px]">
						<p class="shimmer w-[97px] h-[27px] rounded-[20px]"></p>
						<p class="mt-2 shimmer w-[97px] h-[27px] rounded-[20px]"></p>
					</div>
					<a href="#" class="mt-5 inline-block w-full rounded-full shimmer w-[85px] h-[30px]"></a>
				</div>
				<div class="rounded-[9px] p-3 shadow-[0px_4px_4px] shadow-black/10">
					<div class=" mt-5 shimmer w-[84px] h-[33px]"></div>
					<div class="mt-5 min-h-[58px]">
						<p class="shimmer w-[97px] h-[27px]"></p>
						<p class="mt-2 shimmer w-[97px] h-[27px]"></p>
					</div>
					<a href="#" class="mt-5 inline-block w-full rounded-full shimmer w-[85px] h-[30px]"></a>
				</div>
				<div class="rounded-[9px] p-3 shadow-[0px_4px_4px] shadow-black/10">
					<div class=" mt-5 shimmer w-[84px] h-[33px]"></div>
					<div class="mt-5 min-h-[58px]">
						<p class="shimmer w-[97px] h-[27px]"></p>
						<p class="mt-2 shimmer w-[97px] h-[27px]"></p>
					</div>
					<a href="#" class="mt-5 inline-block w-full rounded-full border-[.5px] px-[5px] py-2 text-center font-poppins text-[7px] font-medium text-primary shimmer w-[85px] h-[30px]"></a>
				</div>
			</div>
		</div>
	 </section>
	<!-- section our brands emd -->

    </div>
</template>

<script>
	import HeaderShimmer from "./header-shimmer";

    export default {
		name: 'home-shimmer',

		components: {
			HeaderShimmer,
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
