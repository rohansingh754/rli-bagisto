@props(['options'])

<v-carousel>
    <div class="shimmer aspect-[2.743/1] w-full">
    </div>
</v-carousel>

@pushOnce('scripts')
    <script type="text/x-template" id="v-carousel-template">

		<!-- slider -->
	 <section class="bg-[url(./../images/hero-bg.png)] bg-cover bg-no-repeat pt-16 max-sm:pt-0">
		<div class="relative overflow-hidden">
			<span class="icon-arrow-left absolute left-[23%] top-1/2 z-10 flex h-12 w-12 -translate-y-full cursor-pointer items-center justify-center border-2 border-[#E9E9E9] max-[1400px]:left-[20%] max-[1260px]:left-[18%] max-xl:left-20 max-lg:left-10 max-md:hidden"></span>
			<span class="icon-arrow-right absolute right-[23%] top-1/2 z-10 flex h-12 w-12 -translate-y-full cursor-pointer items-center justify-center border-2 border-[#E9E9E9] max-[1400px]:right-[20%] max-[1260px]:right-[18%] max-xl:right-20 max-lg:right-10 max-md:hidden"></span>
			<div class="active group">
				<div class="homeful-slide mx-auto w-[630px] max-w-full group-[.next]:w-max group-[.prev]:w-max group-[.next]:opacity-60 group-[.prev]:opacity-60">
					<div class="relative max-w-[574px] overflow-hidden rounded-[20px]">
						<img src="./../images/hero-1.png" alt="Agapeya Towns" class="w-full rounded-[20px]">
						<div class="absolute bottom-0 left-0 right-0 flex items-start justify-between gap-4 bg-[linear-gradient(180deg,_#00000000_0%,_#000000_100%)] px-9 pb-9 pt-20 max-sm:flex-wrap max-sm:px-4">
							<div class="">
								<h2 class="text-3xl font-bold text-white">Agapeya Towns</h2>
								<p class="mt-1 text-xl font-normal text-[#CDCDCD]">Calamba, Laguna</p>
							</div>
							<a href="./product.html" class="flex items-center gap-2 rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-4 py-[14px] text-center text-[15px] font-medium text-white">View Project <span class="icon-arrow-right-stylish text-[24px]px] inline-block"></span></a>
						</div>
					</div>
					<div class="mt-7 flex justify-between gap-5 max-md:flex-wrap max-md:px-4">
						<div class="">
							<p class="text-sm font-normal text-[#8B8B8B]">Starts at</p>
							<p class="homefull-text-gradient mt-1 text-xl font-bold leading-7">₱2,900,000</p>
						</div>
						<div class="w-[127px]">
							<p class="text-sm font-normal text-[#8B8B8B]">Total Units Sold</p>
							<p class="mt-1 text-xl font-normal leading-7 text-black">200+</p>
						</div>
						<div class="">
							<p class="text-sm font-normal text-[#8B8B8B]">Product type</p>
							<p class="mt-1 max-w-[440px] text-xl font-normal leading-7 text-black">2 Storey Duplex (FA: 50sqm LA:70sqm) 2 Bedroom, 1 Toilet & Bath and 1 Carport</p>
						</div>
					</div>
				</div>
			</div>
			<div class="next z-1 group absolute right-0 top-10 origin-top translate-x-1/2 scale-75 bg-white max-xl:hidden">
				<div class="homeful-slide mx-auto w-[630px] max-w-full group-[.next]:w-max group-[.prev]:w-max group-[.next]:opacity-60 group-[.prev]:opacity-60">
					<div class="relative max-w-[574px] overflow-hidden rounded-[20px]">
						<img src="./../images/hero-1.png" alt="Agapeya Towns" class="w-full rounded-[20px]">
						<div class="group-[.next]:hi max-sm:px-4dden absolute bottom-0 left-0 right-0 flex items-start justify-between gap-4 bg-[linear-gradient(180deg,_#00000000_0%,_#000000_100%)] px-9 pb-9 pt-20 group-[.prev]:hidden max-sm:flex-wrap">
							<div class="">
								<h2 class="text-3xl font-bold text-white">Agapeya Towns</h2>
								<p class="mt-1 text-xl font-normal text-[#CDCDCD]">Calamba, Laguna</p>
							</div>
							<a href="./product.html" class="flex items-center gap-2 rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-4 py-[14px] text-center text-[15px] font-medium text-white">View Project <span class="icon-arrow-right-stylish text-[24px]px] inline-block"></span></a>
						</div>
					</div>
					<div class="group-[.nex max-md:flex-wrapt]:hidden mt-7 flex justify-between gap-5 group-[.prev]:hidden max-md:px-4">
						<div class="">
							<p class="text-sm font-normal text-[#8B8B8B]">Starts at</p>
							<p class="homefull-text-gradient mt-1 text-xl font-bold leading-7">₱2,900,000</p>
						</div>
						<div class="w-[127px]">
							<p class="text-sm font-normal text-[#8B8B8B]">Total Units Sold</p>
							<p class="mt-1 text-xl font-normal leading-7 text-black">200+</p>
						</div>
						<div class="">
							<p class="text-sm font-normal text-[#8B8B8B]">Product type</p>
							<p class="mt-1 max-w-[440px] text-xl font-normal leading-7 text-black">2 Storey Duplex (FA: 50sqm LA:70sqm) 2 Bedroom, 1 Toilet & Bath and 1 Carport</p>
						</div>
					</div>
				</div>
			</div>
			<div class="group hidden">
				<div class="homeful-slide mx-auto w-[630px] max-w-full group-[.next]:w-max group-[.prev]:w-max group-[.next]:opacity-60 group-[.prev]:opacity-60">
					<div class="relative max-w-[574px] overflow-hidden rounded-[20px]">
						<img src="./../images/hero-1.png" alt="Agapeya Towns" class="w-full rounded-[20px]">
						<div class="group-[.next]:hi max-sm:px-4dden absolute bottom-0 left-0 right-0 flex items-start justify-between gap-4 bg-[linear-gradient(180deg,_#00000000_0%,_#000000_100%)] px-9 pb-9 pt-20 group-[.prev]:hidden max-sm:flex-wrap">
							<div class="">
								<h2 class="text-3xl font-bold text-white">Agapeya Towns</h2>
								<p class="mt-1 text-xl font-normal text-[#CDCDCD]">Calamba, Laguna</p>
							</div>
							<a href="./product.html" class="flex items-center gap-2 rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-4 py-[14px] text-center text-[15px] font-medium text-white">View Project <span class="icon-arrow-right-stylish text-[24px]px] inline-block"></span></a>
						</div>
					</div>
					<div class="group-[.nex max-md:flex-wrapt]:hidden mt-7 flex justify-between gap-5 group-[.prev]:hidden max-md:px-4">
						<div class="">
							<p class="text-sm font-normal text-[#8B8B8B]">Starts at</p>
							<p class="homefull-text-gradient mt-1 text-xl font-bold leading-7">₱2,900,000</p>
						</div>
						<div class="w-[127px]">
							<p class="text-sm font-normal text-[#8B8B8B]">Total Units Sold</p>
							<p class="mt-1 text-xl font-normal leading-7 text-black">200+</p>
						</div>
						<div class="">
							<p class="text-sm font-normal text-[#8B8B8B]">Product type</p>
							<p class="mt-1 max-w-[440px] text-xl font-normal leading-7 text-black">2 Storey Duplex (FA: 50sqm LA:70sqm) 2 Bedroom, 1 Toilet & Bath and 1 Carport</p>
						</div>
					</div>
				</div>
			</div>
			<div class="group hidden">
				<div class="homeful-slide mx-auto w-[630px] max-w-full group-[.next]:w-max group-[.prev]:w-max group-[.next]:opacity-60 group-[.prev]:opacity-60">
					<div class="relative max-w-[574px] overflow-hidden rounded-[20px]">
						<img src="./../images/hero-1.png" alt="Agapeya Towns" class="w-full rounded-[20px]">
						<div class="group-[.next]:hi max-sm:px-4dden absolute bottom-0 left-0 right-0 flex items-start justify-between gap-4 bg-[linear-gradient(180deg,_#00000000_0%,_#000000_100%)] px-9 pb-9 pt-20 group-[.prev]:hidden max-sm:flex-wrap">
							<div class="">
								<h2 class="text-3xl font-bold text-white">Agapeya Towns</h2>
								<p class="mt-1 text-xl font-normal text-[#CDCDCD]">Calamba, Laguna</p>
							</div>
							<a href="./product.html" class="flex items-center gap-2 rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-4 py-[14px] text-center text-[15px] font-medium text-white">View Project <span class="icon-arrow-right-stylish text-[24px]px] inline-block"></span></a>
						</div>
					</div>
					<div class="group-[.nex max-md:flex-wrapt]:hidden mt-7 flex justify-between gap-5 group-[.prev]:hidden max-md:px-4">
						<div class="">
							<p class="text-sm font-normal text-[#8B8B8B]">Starts at</p>
							<p class="homefull-text-gradient mt-1 text-xl font-bold leading-7">₱2,900,000</p>
						</div>
						<div class="w-[127px]">
							<p class="text-sm font-normal text-[#8B8B8B]">Total Units Sold</p>
							<p class="mt-1 text-xl font-normal leading-7 text-black">200+</p>
						</div>
						<div class="">
							<p class="text-sm font-normal text-[#8B8B8B]">Product type</p>
							<p class="mt-1 max-w-[440px] text-xl font-normal leading-7 text-black">2 Storey Duplex (FA: 50sqm LA:70sqm) 2 Bedroom, 1 Toilet & Bath and 1 Carport</p>
						</div>
					</div>
				</div>
			</div>
			<div class="group hidden">
				<div class="homeful-slide mx-auto w-[630px] max-w-full group-[.next]:w-max group-[.prev]:w-max group-[.next]:opacity-60 group-[.prev]:opacity-60">
					<div class="relative max-w-[574px] overflow-hidden rounded-[20px]">
						<img src="./../images/hero-1.png" alt="Agapeya Towns" class="w-full rounded-[20px]">
						<div class="group-[.next]:hi max-sm:px-4dden absolute bottom-0 left-0 right-0 flex items-start justify-between gap-4 bg-[linear-gradient(180deg,_#00000000_0%,_#000000_100%)] px-9 pb-9 pt-20 group-[.prev]:hidden max-sm:flex-wrap">
							<div class="">
								<h2 class="text-3xl font-bold text-white">Agapeya Towns</h2>
								<p class="mt-1 text-xl font-normal text-[#CDCDCD]">Calamba, Laguna</p>
							</div>
							<a href="./product.html" class="flex items-center gap-2 rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-4 py-[14px] text-center text-[15px] font-medium text-white">View Project <span class="icon-arrow-right-stylish text-[24px]px] inline-block"></span></a>
						</div>
					</div>
					<div class="group-[.nex max-md:flex-wrapt]:hidden mt-7 flex justify-between gap-5 group-[.prev]:hidden max-md:px-4">
						<div class="">
							<p class="text-sm font-normal text-[#8B8B8B]">Starts at</p>
							<p class="homefull-text-gradient mt-1 text-xl font-bold leading-7">₱2,900,000</p>
						</div>
						<div class="w-[127px]">
							<p class="text-sm font-normal text-[#8B8B8B]">Total Units Sold</p>
							<p class="mt-1 text-xl font-normal leading-7 text-black">200+</p>
						</div>
						<div class="">
							<p class="text-sm font-normal text-[#8B8B8B]">Product type</p>
							<p class="mt-1 max-w-[440px] text-xl font-normal leading-7 text-black">2 Storey Duplex (FA: 50sqm LA:70sqm) 2 Bedroom, 1 Toilet & Bath and 1 Carport</p>
						</div>
					</div>
				</div>
			</div>
			<div class="prev z-1 group absolute left-0 top-10 origin-top -translate-x-1/2 scale-75 bg-white max-xl:hidden">
				<div class="homeful-slide prev mx-auto w-[630px] max-w-full group-[.next]:w-max group-[.prev]:w-max group-[.next]:opacity-60 group-[.prev]:opacity-60">
					<div class="relative max-w-[574px] overflow-hidden rounded-[20px]">
						<img src="./../images/hero-1.png" alt="Agapeya Towns" class="w-full rounded-[20px]">
						<div class="group-[.next]:hi max-sm:px-4dden absolute bottom-0 left-0 right-0 flex items-start justify-between gap-4 bg-[linear-gradient(180deg,_#00000000_0%,_#000000_100%)] px-9 pb-9 pt-20 group-[.prev]:hidden max-sm:flex-wrap">
							<div class="">
								<h2 class="text-3xl font-bold text-white">Agapeya Towns</h2>
								<p class="mt-1 text-xl font-normal text-[#CDCDCD]">Calamba, Laguna</p>
							</div>
							<a href="./product.html" class="flex items-center gap-2 rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-4 py-[14px] text-center text-[15px] font-medium text-white">View Project <span class="icon-arrow-right-stylish text-[24px]px] inline-block"></span></a>
						</div>
					</div>
					<div class="group-[.nex max-md:flex-wrapt]:hidden mt-7 flex justify-between gap-5 group-[.prev]:hidden max-md:px-4">
						<div class="">
							<p class="text-sm font-normal text-[#8B8B8B]">Starts at</p>
							<p class="homefull-text-gradient mt-1 text-xl font-bold leading-7">₱2,900,000</p>
						</div>
						<div class="w-[127px]">
							<p class="text-sm font-normal text-[#8B8B8B]">Total Units Sold</p>
							<p class="mt-1 text-xl font-normal leading-7 text-black">200+</p>
						</div>
						<div class="">
							<p class="text-sm font-normal text-[#8B8B8B]">Product type</p>
							<p class="mt-1 max-w-[440px] text-xl font-normal leading-7 text-black">2 Storey Duplex (FA: 50sqm LA:70sqm) 2 Bedroom, 1 Toilet & Bath and 1 Carport</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="scrollbar-hide mt-7 overflow-auto pb-9">
				<div class="homeful-slider-thumbs mx-auto flex w-[max-content] gap-3">
					<div
						v-for="category in categories"
						class="thumb active group w-[75px] cursor-pointer">
						<img :src="category.images.logo_url" alt="Agapeya" class="rounded-[8px] border border-transparent transition hover:border-primary group-[.active]:border-primary">
						<p class="mt-[5px] text-[12px] font-normal leading-none text-[#8B8B8B] transition">@{{category.name}}</p>
					</div>
				</div>
			</div>
		</div>
	 </section>
	<!-- slider end -->
    </script>

    <script type="module">
        app.component("v-carousel", {
            template: '#v-carousel-template',

            data() {
                return {
                    images: @json($options['images'] ?? []),

					activeButtonText: '',

					isLoading: true,

					categories: [],

					activeCategory: {
						category: null,
						products: [],
					},

					sliderData:[],
                };
            },

            mounted() {

				this.getCategories();
            },

            methods: {
				onLoad() {
                    this.isLoading = false;
                },

				async getCategories() {

					const response = await this.$axios.get("{{ route('shop.api.categories.index', []) }}");

					if(response){
						this.categories = response.data.data;

						for (const category of this.categories) {

							const products = await this.getCategoryProduct(category.id);
							console.log(category.id, 'product', products);

							if (products.length) {
								this.sliderData.push({
									'category': category,
									'products': products,
								});
							}
						}
					}
                },

				async getCategoryProduct(category_id){
					let params = {
						category_id:category_id,
						limit:10,
						sort: 'id-desc',
						featured: 1,
					}

					try {
						const response = await this.$axios.get(`{{ route('shop.api.products.index') }}`, { params: params })

						return response.data.data;
					} catch (error) {
						console.error(error);
						return [];
					}
				},
            }
        });
    </script>
@endpushOnce
