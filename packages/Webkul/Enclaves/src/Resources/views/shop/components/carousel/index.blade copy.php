@props(['options'])

<v-carousel>
    <div class="shimmer aspect-[2.743/1] w-full">
    </div>
</v-carousel>

@pushOnce('scripts')
    <script type="text/x-template" id="v-carousel-template">

		<!-- Hero section -->
		<div class="grid grid-cols-2 flex-col-reverse overflow-hidden max-1100:flex sm:px-[34px]">
			<div class="sm:bg-full min-w-full bg-[url('../images/hero-bg.png')] bg-contain bg-right-top bg-no-repeat py-[70px] max-lg:py-5">
				<div class="m-auto w-full max-w-[532px] px-5 max-1180:max-w-[472px] max-1100:mx-0 max-1100:h-auto sm:px-0">

					<div class="max-lg:h-[160px] md:h-[250px] lg:h-[250px]">
						<p class="font-bold text-[#CC035C] max-md:text-[12px] lg:text-xs">
							@lang('enclaves::app.shop.homepage.slider.title')
						</p>

						<h1 class="hero-heading mt-2 pr-6 text-[60px] font-bold leading-[74px] max-1180:text-[46px] max-lg:text-[35px] max-lg:leading-[42px] sm:mt-[18px]">
						</h1>
					</div>

					<a
						href="javascript:void(0)"
						class="hero-btn mt-[94px] flex h-[100px] max-w-max items-center gap-[18px] rounded-[20px] bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-[60px] py-[30px] text-[25px] font-medium text-white max-lg:mt-5 max-lg:h-[50px] max-lg:px-[26px] max-lg:py-[18px] max-lg:text-[14px] sm:text-[25px]"
					>
						<span class="" v-text="activeButtonText"></span>
						<span class="icon-arrow-right-stylish inline-block cursor-pointer text-[18px] font-medium sm:text-[40px]"></span>
					</a>

					<div class="dot-container hidden"></div>
				</div>
			</div>
			<div class="et-slider-section sm:mt-[72px]">
				<div class="et-slider">
					<a
						v-for="(image, index) in images"
						class="fade"
						ref="slides"
						rel="preload"
						aria-label="Image Slide"
						:href="image.link || '#'"
						:key="index"
						>
						<div
							class="shimmer h-[120px] w-[640px]"
							v-show="isLoading"
							>
						</div>

						<img
							class="aspect-[2.743/1] w-full"
							:class="image.className"
							:src="image.image"
							:srcset="image.image + ' 1920w, ' + image.image.replace('storage', 'cache/large') + ' 1280w,' + image.image.replace('storage', 'cache/medium') + ' 1024w, ' + image.image.replace('storage', 'cache/small') + ' 525w'"
							alt="homepage-image"
							@load="onLoad"
							v-show="! isLoading"
						/>
					</a>
				</div>
			</div>
		</div>
    </script>

    <script type="module">
        app.component("v-carousel", {
            template: '#v-carousel-template',

            data() {
                return {
                    images: @json($options['images'] ?? []),

					activeButtonText: '',

					isLoading: true,
                };
            },

            mounted() {
				let sliderImg = document.querySelectorAll('.et-slider img');

				let active = 0;

				let prev = sliderImg.length - 1;

				let next = 1;

				let dotContainer, dots = [];

				let dummyHeading = document.querySelector('.hero-heading');

				let dummyButton = document.querySelector('.hero-btn');

				let typing;

				let sliderDots = () => {
					dotContainer = document.querySelector('.dot-container');

					for (let i = 0; i < sliderImg.length; i++) {
						let span = document.createElement('span')

						if (i == 0) span.classList.add('active')

						span.classList.add('dot')

						dotContainer.appendChild(span);
					}
				}

				sliderDots()

				let changeContent = () => {
					dummyButton.setAttribute('href', this.images[active]['link']);

					let slider_syntax = this.images[active]['slider_syntax'];

					this.activeButtonText = this.images[active]['button_text'];

					slider_syntax = slider_syntax.split('')

					let titleCounts = ''

					let pos = 0;

					clearInterval(typing);

					typing = setInterval(() => {
						titleCounts += slider_syntax[pos]

						dummyHeading.innerHTML = titleCounts

						pos++;

						if (pos == slider_syntax.length) {
							clearInterval(typing)
						}
					}, 30);
				}

				changeContent();

				let changeImage = () => {
					dots = document.querySelectorAll('.dot-container .dot');

					sliderImg.forEach((ele, i) => {
						if (i === prev) {
							ele.className = 'prev'
						} else if (i === active) {
							ele.className = 'active';
						} else if (i === next) {
							ele.className = 'next'
						} else {
							ele.className = 'd-none'
						}

						dots[i].classList.remove('active');
					})

					dots[active].classList.add('active');
				}

				changeImage();

				function setSliderInterval() {
					prev = active;

					active = next;

					if (active + 1 == sliderImg.length) {
						next = 0;
					} else {
						next = active + 1;
					}

					changeImage()

					changeContent()
				}

				let sliderInterval = setInterval(() => {
					setSliderInterval();
				}, 5000);

				let dotEvents = () => {
					dots.forEach((ele, i) => {
						ele.addEventListener('click', () => {
							active = i;

							if (i == sliderImg.length - 1) {
								next = 0;
								prev = active - 1
							} else if (i == 0) {
								prev = sliderImg.length - 1;
								next = active + 1;
							} else {
								next = i + 1;
								prev = active - 1;
							}

							changeImage()
							changeContent()
							clearInterval(sliderInterval)
						})
					})
				}

				dotEvents();
            },

            methods: {
				onLoad() {
                    this.isLoading = false;
                },
            }
        });
    </script>
@endpushOnce
