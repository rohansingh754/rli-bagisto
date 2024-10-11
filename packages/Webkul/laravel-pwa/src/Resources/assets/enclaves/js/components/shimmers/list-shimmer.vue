<template>
	<div class="content simmer-container">
		<!-- header -->
	<header class="sticky top-0 z-[999] border-b-[1px] border-[#E9E9E9] bg-white">
		<div class="container px-[18px] py-6">
			<div class="flex items-center justify-between">
				<div class="homeful-toggler cursor-pointer py-[10px] pr-4 mr-4 w-[19px] h-[12px] shimmer">
				</div>
				<a href="#" class="homeful-logo mr-auto shimmer w-[139px] h-[28px]">
					<!-- <img src="./../images/logo.png" alt="homeful"> -->
				</a>
				<a href="#" class="homeful-share text-[24px] text-dark w-[24px] h-[24px] shimmer">
				</a>
			</div>
		</div>
	</header>
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
			<div class="flex w-max items-center gap-[26px]">
				<a href="#" class="rounded-full  text-[17px] font-medium text-white shimmer w-[50px] h-[50px]"></a>
				<a href="#" class="px-2 py-2 text-[16px] font-normal text-dark shimmer w-[59px] h-[24px]"></a>
				<a href="#" class="px-2 py-2 text-[16px] font-normal text-dark shimmer w-[59px] h-[24px]"></a>
				<a href="#" class="px-2 py-2 text-[16px] font-normal text-dark shimmer w-[59px] h-[24px]"></a>
				<a href="#" class="px-2 py-2 text-[16px] font-normal text-dark shimmer w-[59px] h-[24px]"></a>
			</div>
		</div>
		<div class="container">
			<div class="mt-6 grid grid-cols-2 gap-[14px]">
				<div class="slide-card w-[184px]">
					<div class="w-full rounded-[20px] shimmer h-[151px]"></div>
					<p class="mt-3 text-[14px] font-bold text-dark shimmer w-full h-[63px]"></p>
					<a href="#" class="mt-3 inline-block text-center text-[14px] font-normal text-primary underline shimmer w-[67px] h-[21px]"></a>
				</div>
				<div class="slide-card w-[184px]">
					<div class="w-full rounded-[20px] shimmer h-[151px]"></div>
					<p class="mt-3 text-[14px] font-bold text-dark shimmer w-full h-[63px]"></p>
					<a href="#" class="mt-3 inline-block text-center text-[14px] font-normal text-primary underline shimmer w-[67px] h-[21px]"></a>
				</div>
				<div class="slide-card w-[184px]">
					<div class="w-full rounded-[20px] shimmer h-[151px]"></div>
					<p class="mt-3 text-[14px] font-bold text-dark shimmer w-full h-[63px]"></p>
					<a href="#" class="mt-3 inline-block text-center text-[14px] font-normal text-primary underline shimmer w-[67px] h-[21px]"></a>
				</div>
				<div class="slide-card w-[184px]">
					<div class="w-full rounded-[20px] shimmer h-[151px]"></div>
					<p class="mt-3 text-[14px] font-bold text-dark shimmer w-full h-[63px]"></p>
					<a href="#" class="mt-3 inline-block text-center text-[14px] font-normal text-primary underline shimmer w-[67px] h-[21px]"></a>
				</div>
				<div class="slide-card w-[184px]">
					<div class="w-full rounded-[20px] shimmer h-[151px]"></div>
					<p class="mt-3 text-[14px] font-bold text-dark shimmer w-full h-[63px]"></p>
					<a href="#" class="mt-3 inline-block text-center text-[14px] font-normal text-primary underline shimmer w-[67px] h-[21px]"></a>
				</div>
			</div>
		</div>
	 </section>
	<!-- posts end -->

	<!-- footer  -->
	<footer
	class="relative pt-[89px]">
		<div class="container">
			<p class="text-[14px] font-bold text-dark shimmer w-[67px] h-[21px]"></p>
			<div class="">
				<div class="">
					<div class="mt-[25px] flex items-center gap-[18px]">
						<a class="text-[18px] font-normal text-black shimmer w-[180px] h-[27px]"></a>
					</div>
					<div class="mt-[17px] flex items-center gap-[18px]">
						<a class="text-[18px] font-normal text-black shimmer w-[180px] h-[27px]"></a>
					</div>
				</div>
				<div class="mt-[24px]">
					<p class="text-[14px] font-bold text-dark shimmer w-[67px] h-[21px]"></p>

					<div class="mt-[15px] flex gap-[20px]">
						<div class="rounded-full shimmer w-[40px] h-[40px]"></div>
						<div class="rounded-full shimmer w-[40px] h-[40px]"></div>
						<div class="rounded-full shimmer w-[40px] h-[40px]"></div>
						<div class="rounded-full shimmer w-[40px] h-[40px]"></div>
						<div class="rounded-full shimmer w-[40px] h-[40px]"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="mt-[20px] shimmer w-full h-[60px]"></div>
	</footer>
	<!-- footer end  -->
	</div>
</template>

<script>

    export default {
        name: 'list-shimmer',
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
