@inject ('reviewHelper', 'Webkul\Product\Helpers\Review')
@inject ('productViewHelper', 'Webkul\Product\Helpers\View')

@php
    $avgRatings = round($reviewHelper->getAverageRating($product));

    $percentageRatings = $reviewHelper->getPercentageRating($product);

    $customAttributeValues = $productViewHelper->getAdditionalData($product);

    $attributeData = collect($customAttributeValues)->filter(fn ($item) => ! empty($item['value']));
@endphp

<!-- SEO Meta Content -->
@push('meta')
    <meta
        name="description"
        content="{{ trim($product->meta_description) != "" ? $product->meta_description : \Illuminate\Support\Str::limit(strip_tags($product->description), 120, '') }}"
    />

    <meta
        name="keywords"
        content="{{ $product->meta_keywords }}"
    />

    @if (core()->getConfigData('catalog.rich_snippets.products.enable'))
        <script type="application/ld+json">
            {{ app('Webkul\Product\Helpers\SEO')->getProductJsonLd($product) }}
        </script>
    @endif

    <?php $productBaseImage = product_image()->getProductBaseImage($product); ?>

    <meta
        name="twitter:card"
        content="summary_large_image"
    />

    <meta
        name="twitter:title"
        content="{{ $product->name }}"
    />

    <meta
        name="twitter:description"
        content="{!! htmlspecialchars(trim(strip_tags($product->description))) !!}"
    />

    <meta
        name="twitter:image:alt"
        content=""
    />

    <meta
        name="twitter:image"
        content="{{ $productBaseImage['medium_image_url'] }}"
    />

    <meta
        property="og:type"
        content="og:product"
    />

    <meta
        property="og:title"
        content="{{ $product->name }}"
    />

    <meta
        property="og:image"
        content="{{ $productBaseImage['medium_image_url'] }}"
    />

    <meta
        property="og:description"
        content="{!! htmlspecialchars(trim(strip_tags($product->description))) !!}"
    />

    <meta
        property="og:url"
        content="{{ route('shop.product_or_category.index', $product->url_key) }}"
    />
@endPush

@push ('styles')
    <style>
        ul {
            padding-left: 40px;
            list-style: disc;
        }

        .product-price p {
            color: black !important;
        }
    </style>
@endpush

@pushOnce('scripts')
    <script>
		document.addEventListener("DOMContentLoaded", () => {
			let img = document.querySelectorAll('.et-slider img');

			let active = 1;

			let prev = 0;

			let next = 2;

			let changeImage = () => {
				img.forEach((ele, i) => {
					if (i === prev) {
						ele.className = 'prev'
					}
					else if (i === active) {
						ele.className = 'active'
					} else if (i === next) {
						ele.className = 'next'
					} else {
						ele.className = 'd-none'
					}
				})
			}

			changeImage();

			let sliderInterval = setInterval(() => {
				prev = active;
				active = next;
				if (active + 1 == img.length) {
					next = 0;
				} else {
					next = active + 1;
				}

				changeImage()
			}, 5000);
		});
	</script>
@endPushOnce

<!-- Page Layout -->
<x-shop::layouts>
    <div class="container px-[60px] max-lg:px-[15px]">
        <!-- Page Title -->
        <x-slot:title>
            {{ trim($product->meta_title) != "" ? $product->meta_title : $product->name }}
        </x-slot>

        {!! view_render_event('bagisto.shop.products.view.before', ['product' => $product]) !!}

        <!-- Breadcrumbs -->
        <x-shop::breadcrumbs name="product" :entity="$product"></x-shop::breadcrumbs>

        <!-- Product Information Vue Component -->
        <v-product ref="details" :product-id="{{ $product->id }}">
            <x-shop::shimmer.products.view />
        </v-product>

        {!! view_render_event('bagisto.shop.products.view.after', ['product' => $product]) !!}

        @pushOnce('scripts')
            <script type="text/x-template" id="v-product-template">
                <div>
                    <section class="pt-11 max-sm:pt-3">
                        <div class="flex items-center justify-between gap-8 rounded-[20px] px-6 py-5 shadow-[20px_4px_54px] shadow-black/5 max-md:gap-2 max-md:border max-md:border-[#D9D9D9] max-md:px-2 max-md:py-2 max-md:shadow-none">
                            <div class="h-[70px] w-[230px] overflow-hidden max-md:h-[60px] max-md:w-[160px] max-sm:w-1/3">
                                <img
                                    src="{{asset('storage/' . $product->categories->first()->logo_path)}}"
                                    alt=""
                                    >
                            </div>
                            <div class="mr-auto h-[70px] w-[230px] overflow-hidden max-md:h-[60px] max-md:w-[160px] max-sm:w-1/3">
                                {{-- <img src="./../images/agapeya-product.png" alt="" class="h-full w-full object-contain"> --}}
                            </div>
                            <a href="#" class="block px-6 py-5 text-lg font-normal text-primary underline max-md:px-2 max-sm:p-0 max-sm:text-[12px]">Store Details</a>
                        </div>
                    </section>
                    <x-shop::form
                        v-slot="{ meta, errors, handleSubmit }"
                        as="div"
                        >
                        <form
                            ref="formData"
                            @submit="handleSubmit($event, addToCart)"
                            >
                            <input
                                type="hidden"
                                name="product_id"
                                value="{{ $product->id }}"
                            >

                            <input
                                type="hidden"
                                name="is_buy_now"
                                v-model="is_buy_now"
                            >

                            <input
                                type="hidden"
                                name="quantity"
                                :value="qty"
                            >

                            <div class="flex gap-12 max-lg:gap-6 max-md:flex-wrap">
                                <div class="sticky top-24 w-[540px] max-lg:w-1/2 max-md:static max-md:w-full">
                                    <!-- Gallery Blade Inclusion -->
                                    @include('shop::products.view.gallery')

                                </div>

                                <div class="max-md:w-full max-sm:grid">
                                    <h1 class="text-3xl font-medium text-dark max-sm:mt-6 max-sm:text-xl">Agapeya Towns</h1>
                                    <p class="mt-2 text-lg font-normal text-primary max-sm:text-sm max-sm:font-semibold">Calamba, Laguna</p>
                                    <div class="mt-8 flex gap-5 max-sm:-order-1 max-sm:mt-0">
                                        <div class="">
                                            <p class="text-sm font-normal text-[#8B8B8B] max-sm:text-[12px]">Price Starts At</p>
                                            <p class="homefull-text-gradient mt-1 text-xl font-bold leading-7 max-sm:mt-[2px]">₱2,900,000</p>
                                        </div>
                                        <div class="w-[127px]">
                                            <p class="text-sm font-normal text-[#8B8B8B] max-sm:text-[12px]">Total Units Sold</p>
                                            <p class="mt-1 text-xl font-normal leading-7 text-black max-sm:mt-[2px] max-sm:font-bold">200+</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-center gap-7 bg-white max-[880px]:flex-wrap max-md:fixed max-md:inset-x-0 max-md:bottom-0 max-md:z-50 max-md:flex-nowrap max-md:px-6 max-md:py-4 max-md:shadow-[0px_-3px_11px] max-md:shadow-black/10 max-sm:gap-5 max-[390px]:gap-3 max-[390px]:px-4 md:mt-6 md:justify-start">
                                        <a href="#" class="flex flex-col items-center gap-1 text-sm font-normal text-primary underline max-md:text-[#8B8B8B] max-md:no-underline max-sm:text-[12px]">
                                            <span>
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M4.75 1V3.25M15.25 1V3.25M1 16.75V5.5C1 4.90326 1.23705 4.33097 1.65901 3.90901C2.08097 3.48705 2.65326 3.25 3.25 3.25H16.75C17.3467 3.25 17.919 3.48705 18.341 3.90901C18.7629 4.33097 19 4.90326 19 5.5V16.75M1 16.75C1 17.3467 1.23705 17.919 1.65901 18.341C2.08097 18.7629 2.65326 19 3.25 19H16.75C17.3467 19 17.919 18.7629 18.341 18.341C18.7629 17.919 19 17.3467 19 16.75M1 16.75V9.25C1 8.65326 1.23705 8.08097 1.65901 7.65901C2.08097 7.23705 2.65326 7 3.25 7H16.75C17.3467 7 17.919 7.23705 18.341 7.65901C18.7629 8.08097 19 8.65326 19 9.25V16.75" stroke="url(#paint0_linear_4447_6623)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <defs>
                                                    <linearGradient id="paint0_linear_4447_6623" x1="10" y1="1" x2="10" y2="19" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#D21755"/>
                                                    <stop offset="1" stop-color="#FAAA19"/>
                                                    </linearGradient>
                                                    </defs>
                                                    </svg>
                                            </span>
                                            Schedule Visit
                                        </a>
                                        <a href="#" class="flex items-center gap-2 rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-9 py-[14px] text-base font-medium text-white max-sm:gap-1.5 max-sm:px-5 max-sm:py-2 max-[390px]:gap-0.5 max-[390px]:px-3 max-[390px]:text-[12px]"><span class="font-bold">Avail Now</span> for P10,000
                                            <span class="max-[390px]:-ml-1 max-[390px]:origin-right max-[390px]:scale-75">
                                                <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M27.2509 12.6739L26.2715 12.0866C25.8541 11.8359 25.5731 11.4236 25.4452 10.9557C25.4435 10.9473 25.4418 10.9372 25.4385 10.9288C25.3072 10.4559 25.3459 9.95276 25.5849 9.52363L26.1386 8.52403C26.7057 7.50422 25.9804 6.24714 24.8125 6.22694L23.6597 6.20843C23.1717 6.19834 22.719 5.98293 22.3757 5.63795C22.3723 5.63458 22.3673 5.63122 22.3639 5.62785C22.0189 5.28287 21.8018 4.83018 21.7951 4.34216L21.7749 3.18941C21.7547 2.01983 20.4976 1.29453 19.4761 1.86165L18.4782 2.41698C18.0491 2.65427 17.5459 2.69297 17.0713 2.56339C17.0629 2.56171 17.0545 2.55834 17.0461 2.55498C16.5782 2.42708 16.1643 2.14605 15.9152 1.7287L15.3279 0.750969C14.7271 -0.250323 13.2765 -0.250323 12.6757 0.750969L12.0901 1.72534C11.8393 2.14605 11.422 2.42876 10.9508 2.55834C10.9457 2.55834 10.9407 2.56171 10.9356 2.56171C10.4594 2.69297 9.95115 2.65427 9.51866 2.4153L8.52409 1.86165C7.5026 1.29453 6.2455 2.01983 6.22531 3.18773L6.2068 4.34048C6.19838 4.8285 5.98129 5.28119 5.63631 5.62449C5.63294 5.62785 5.62958 5.6329 5.62621 5.63627C5.28123 5.98125 4.82854 6.19834 4.34051 6.20507L3.18943 6.22526C2.01985 6.24545 1.29454 7.50254 1.86166 8.52403L2.417 9.52195C2.65429 9.95108 2.69299 10.4542 2.56341 10.9288C2.56173 10.9372 2.55836 10.9456 2.555 10.9541C2.4271 11.4219 2.14606 11.8359 1.72871 12.0849L0.750975 12.6722C-0.250325 13.273 -0.250325 14.7253 0.750975 15.3244L1.72871 15.9134C2.14606 16.1625 2.42878 16.5748 2.555 17.0443C2.55836 17.0527 2.56005 17.0611 2.56341 17.0695C2.69299 17.5441 2.65429 18.0456 2.417 18.4764L1.86166 19.476C1.29622 20.4975 2.02153 21.7545 3.18943 21.7747L4.34051 21.7933C4.82854 21.8017 5.28123 22.0188 5.62621 22.3637C5.62958 22.3671 5.63294 22.3705 5.63631 22.3738C5.98298 22.7188 6.19838 23.1715 6.2068 23.6595L6.22531 24.8106C6.2455 25.9768 7.5026 26.7038 8.52409 26.1367L9.52202 25.583C9.95115 25.3441 10.4543 25.3053 10.9289 25.4366C10.9373 25.4383 10.9457 25.44 10.9541 25.4433C11.422 25.5712 11.836 25.8523 12.085 26.2696L12.6723 27.249C13.2731 28.2503 14.7237 28.2503 15.3245 27.249L15.9118 26.2696C16.1609 25.8523 16.5749 25.5712 17.0427 25.4433C17.0511 25.4417 17.0595 25.4383 17.068 25.4366C17.5408 25.3053 18.0457 25.3441 18.4748 25.583L19.4728 26.1367C20.4942 26.7038 21.7513 25.9768 21.7715 24.8106L21.79 23.6595C21.7985 23.1715 22.0156 22.7188 22.3605 22.3738C22.3639 22.3705 22.3673 22.3671 22.3706 22.3637C22.7156 22.0171 23.1683 21.8017 23.6563 21.7933L24.8074 21.7747C25.9753 21.7545 26.7023 20.4975 26.1352 19.476L25.5798 18.478C25.3426 18.0489 25.3039 17.5458 25.4334 17.0712C25.4368 17.0628 25.4385 17.0544 25.4418 17.0459C25.5697 16.5781 25.8508 16.1641 26.2681 15.9151L27.2459 15.3261C28.2505 14.7253 28.2505 13.2747 27.2509 12.6739ZM20.1459 11.5296L13.0813 18.5958C12.8793 18.7978 12.605 18.9105 12.3206 18.9105C12.0345 18.9105 11.7602 18.7978 11.5583 18.5958L7.83917 14.8768C7.41845 14.4561 7.41845 13.7745 7.83917 13.3538C8.25988 12.9331 8.94144 12.9331 9.36215 13.3538L12.3206 16.3105L18.6246 10.0083C19.0453 9.5859 19.7252 9.5859 20.1459 10.0083C20.5683 10.429 20.5683 11.1089 20.1459 11.5296Z" fill="white"/>
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="mt-9 rounded-[10px] bg-white px-7 py-6 shadow-[20px_4px_54px] shadow-black/5 max-md:p-0 max-md:shadow-none max-sm:mt-5 max-sm:border-t max-sm:border-[#D9D9D9] max-sm:pt-7">
                                        <h2 class="text-base font-medium text-dark">House Features</h2>
                                        <div class="mt-6 grid max-w-[652px] grid-cols-2 gap-x-12 gap-y-3 max-xl:grid-cols-1 max-md:grid-cols-2 max-md:gap-x-6 max-sm:grid-cols-1">
                                            <div class="flex items-center">
                                                <span class="mr-5 block w-[22px]">
                                                    <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_3830_14069)">
                                                        <path d="M7.78613 0C7.40332 0 7.02051 0.127495 6.70367 0.384267C6.70367 0.383376 6.70367 0.383376 6.70367 0.384267L2.73926 3.59303C2.1377 4.07983 1.78613 4.8234 1.78613 5.60977V11.8017C1.78613 12.4579 2.31478 13 2.9528 13H12.6195C13.2575 13 13.7861 12.4579 13.7861 11.8017V5.60977C13.7861 4.8234 13.4346 4.07983 12.833 3.59303L12.7861 3.5538V0.850559C12.7861 0.567039 12.5622 0.337014 12.2861 0.337014H10.6195C10.3434 0.337014 10.1195 0.567039 10.1195 0.850559V1.3962L8.8686 0.384267C8.55176 0.127495 8.16895 0 7.78613 0ZM7.78613 1.02442C7.94933 1.02442 8.11252 1.08058 8.24967 1.19114L10.3104 2.85749C10.4606 2.97963 10.6655 3.00192 10.8373 2.91633C11.0101 2.83074 11.1195 2.65153 11.1195 2.4545V1.3641H11.7861V3.80344C11.7861 3.96036 11.8564 4.10925 11.9771 4.20643L12.2141 4.39901C12.5761 4.69145 12.7861 5.13723 12.7861 5.60977V11.8017C12.7861 11.9034 12.7176 11.9729 12.6195 11.9729H2.9528C2.85471 11.9729 2.78613 11.9034 2.78613 11.8017V5.60977C2.78613 5.13723 2.9962 4.69145 3.35818 4.39901L7.32259 1.19114C7.45974 1.08058 7.62294 1.02442 7.78613 1.02442ZM4.61947 6.4951C4.34342 6.49599 4.11947 6.72512 4.11947 7.00864V9.74755C4.11947 10.032 4.34342 10.2611 4.61947 10.2611H6.61947C6.89551 10.2611 7.11947 10.032 7.11947 9.74755V7.00864C7.11947 6.72512 6.89551 6.49599 6.61947 6.4951H4.61947ZM8.9528 6.4951C8.67676 6.49599 8.4528 6.72512 8.4528 7.00864V9.74755C8.4528 10.032 8.67676 10.2611 8.9528 10.2611H10.9528C11.2288 10.2611 11.4528 10.032 11.4528 9.74755V7.00864C11.4528 6.72512 11.2288 6.49599 10.9528 6.4951H8.9528ZM5.11947 7.52219H6.11947V9.234H5.11947V7.52219ZM9.4528 7.52219H10.4528V9.234H9.4528V7.52219Z" fill="black"/>
                                                        </g>
                                                        <defs>
                                                        <clipPath id="clip0_3830_14069">
                                                        <rect width="15" height="15" fill="white" transform="translate(0.786133)"/>
                                                        </clipPath>
                                                        </defs>
                                                    </svg>
                                                </span>
                                                <p class="mr-2 w-20 text-[12px] font-normal text-dark">House Type:</p>
                                                <p class="text-[12px] font-normal text-dark">Two Storey Duplex</p>
                                            </div>
                                            <div class="flex items-center">
                                                <span class="mr-5 block w-[22px]">
                                                    <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_3830_14043)">
                                                        <path d="M2.40544 3.125C1.63287 3.125 0.999186 3.75868 0.999186 4.53125V7.1875C0.999186 7.19184 0.999186 7.19672 0.999186 7.20106C0.643283 7.45714 0.374186 7.8125 0.374186 8.28125V11.5126C0.368761 11.5462 0.368761 11.5804 0.374186 11.6135V12.8125C0.372559 12.9253 0.431695 13.0301 0.529351 13.087C0.626465 13.1434 0.746908 13.1434 0.844021 13.087C0.941678 13.0301 1.00081 12.9253 0.999186 12.8125V11.875H14.1242V12.8125C14.1226 12.9253 14.1817 13.0301 14.2794 13.087C14.3765 13.1434 14.4969 13.1434 14.594 13.087C14.6917 13.0301 14.7508 12.9253 14.7492 12.8125V11.6124C14.7546 11.5788 14.7546 11.5446 14.7492 11.5115V8.28125C14.7492 7.8125 14.4801 7.45714 14.1242 7.20106C14.1242 7.19672 14.1242 7.19184 14.1242 7.1875V4.53125C14.1242 3.75868 13.4905 3.125 12.7179 3.125H8.65544C8.17421 3.125 7.81559 3.41037 7.56169 3.78147C7.30778 3.41037 6.94916 3.125 6.46794 3.125H2.40544ZM2.40544 3.75H6.46794C6.90251 3.75 7.24919 4.09668 7.24919 4.53125V6.875H1.78044C1.71967 6.875 1.68278 6.93197 1.62419 6.93956V4.53125C1.62419 4.09668 1.97087 3.75 2.40544 3.75ZM8.65544 3.75H12.7179C13.1525 3.75 13.4992 4.09668 13.4992 4.53125V6.93956C13.4406 6.93197 13.4037 6.875 13.3429 6.875H7.87419V4.53125C7.87419 4.09668 8.22087 3.75 8.65544 3.75ZM1.78044 7.5H7.51177C7.51937 7.50163 7.52696 7.50271 7.53456 7.5038C7.56114 7.50597 7.58718 7.50434 7.61268 7.5H13.3429C13.7775 7.5 14.1242 7.84668 14.1242 8.28125V11.25H0.999186V8.28125C0.999186 7.84668 1.34587 7.5 1.78044 7.5Z" fill="black"/>
                                                        </g>
                                                        <defs>
                                                        <clipPath id="clip0_3830_14043">
                                                        <rect width="15" height="15" fill="white" transform="translate(0.374023)"/>
                                                        </clipPath>
                                                        </defs>
                                                    </svg>
                                                </span>
                                                <p class="mr-2 w-20 text-[12px] font-normal text-dark">Bedroom:</p>
                                                <p class="text-[12px] font-normal text-dark">2 (Two)</p>
                                            </div>
                                            <div class="flex items-center">
                                                <span class="mr-5 block w-[22px]">
                                                    <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M2.27891 0.298828C2.11432 0.298828 1.98047 0.432682 1.98047 0.597787V1.49362C1.98047 1.5207 1.98359 1.54727 1.99089 1.57331L2.3612 2.91393L2.64193 5.09518C2.64245 5.09935 2.64297 5.10352 2.64349 5.10768L3.06953 7.60977C3.07786 7.66029 3.09974 7.70768 3.13203 7.74779L3.4737 8.17018V8.5155C3.4737 8.62904 3.53828 8.73268 3.64036 8.7832L3.77214 8.84779V8.85768L3.36797 9.37591C3.34036 9.41081 3.32109 9.45195 3.31172 9.4957L3.18203 10.0915C3.16745 10.1582 3.1763 10.2275 3.20651 10.2884L3.45547 10.7874L3.18359 11.8749C3.15859 11.9764 3.18828 12.0842 3.26276 12.1582L3.4737 12.3691V13.1415C3.4737 13.2207 3.50495 13.2967 3.5612 13.353L3.85964 13.6514C3.91224 13.704 3.98255 13.7353 4.05703 13.7384L10.3289 14.0374C10.3336 14.0374 10.3383 14.0379 10.343 14.0379H10.6419C10.6419 14.1171 10.6732 14.1931 10.7294 14.2488L11.0279 14.5478C11.0956 14.6155 11.1919 14.6467 11.2867 14.6311C11.3815 14.616 11.4633 14.5556 11.506 14.4702L11.8049 13.8728C11.8471 13.7884 11.8471 13.6895 11.8049 13.6056L11.6081 13.2124L12.0013 13.4087C12.043 13.4296 12.0888 13.4405 12.1352 13.4405H13.031C13.1961 13.4405 13.3294 13.3066 13.3294 13.1415V12.2827L13.6112 11.1556L13.8956 10.5874C13.9164 10.5457 13.9268 10.4999 13.9268 10.4535V10.2457L14.4742 9.42487C14.507 9.37591 14.5242 9.3181 14.5242 9.25924V8.96029C14.5242 8.7957 14.3904 8.66185 14.2258 8.66185H13.8518L13.6878 8.103C13.6758 8.06133 13.6549 8.02331 13.6268 7.99102L13.3523 7.67539C13.3133 7.6306 13.2617 7.59831 13.2044 7.5832L13.0023 7.52904L12.9378 7.03372C12.9352 7.01497 12.931 6.99622 12.9247 6.97799L12.6435 6.13529C12.6211 6.06758 12.5753 6.01029 12.5143 5.97383L12.0154 5.67487L11.8273 5.46081L11.7107 5.14675C11.6982 5.11237 11.6799 5.08112 11.656 5.05404L11.4013 4.76289C11.3862 4.7457 11.3695 4.7306 11.3508 4.71706L11.1128 4.54466L10.882 4.17175C10.8674 4.14831 10.8497 4.12747 10.8294 4.10872L10.4492 3.75924C10.4299 3.74206 10.4086 3.72695 10.3857 3.71497L9.92474 3.47435L9.91016 3.40872C9.90234 3.37227 9.88776 3.33737 9.86693 3.30612L9.61432 2.92695L9.58307 2.7806C9.5763 2.74935 9.56484 2.71966 9.5487 2.69258L9.10755 1.93997C9.05391 1.84831 8.95547 1.79258 8.84974 1.79258H8.32891L8.06693 1.64935L7.95391 1.42331V1.35508L8.04401 1.2431L8.31068 1.18945C8.45026 1.16133 8.55078 1.03893 8.55078 0.896224V0.597787C8.55078 0.432682 8.41745 0.298828 8.25234 0.298828H2.27891ZM2.57786 0.896224H7.55599L7.42213 1.06341C7.37995 1.11602 7.35651 1.18216 7.35651 1.24987V1.49362C7.35651 1.53997 7.36693 1.58581 7.38776 1.62747L7.57474 2.00039C7.60182 2.05508 7.64505 2.09987 7.6987 2.12904L8.10963 2.35299C8.15338 2.37695 8.20234 2.38945 8.25234 2.38997H8.67891L9.00963 2.95299L9.04297 3.1082C9.05078 3.14518 9.06536 3.18008 9.08568 3.21081L9.33828 3.58945L9.37005 3.73685C9.3888 3.82331 9.44505 3.89727 9.52318 3.93841L10.0742 4.22591L10.3956 4.5207L10.6357 4.90925C10.6565 4.94258 10.6836 4.97122 10.7154 4.99414L10.9737 5.18164L11.1701 5.4056L11.2867 5.72018C11.2997 5.75404 11.3185 5.78529 11.3424 5.81289L11.5971 6.10404C11.6174 6.12747 11.6414 6.14779 11.6685 6.16393L12.1122 6.42956L12.3492 7.13997L12.4362 7.80404C12.4513 7.92435 12.5378 8.02331 12.6549 8.05456L12.9617 8.13633L13.1331 8.3332L13.3419 9.04414C13.3794 9.17175 13.4956 9.25872 13.6284 9.25924H13.8669L13.3799 9.98945C13.3471 10.0384 13.3294 10.0962 13.3294 10.1551V10.3832L13.0628 10.9176C13.0529 10.9368 13.0451 10.9577 13.0398 10.9785L12.7409 12.1733C12.7352 12.1973 12.7326 12.2212 12.7326 12.2457V12.8431H12.2055L11.6711 12.5759C11.5565 12.5186 11.4174 12.541 11.3263 12.6316L11.0279 12.9306C10.9367 13.0212 10.9143 13.1603 10.9716 13.2754L11.069 13.4702C11.0289 13.4509 10.9852 13.4405 10.9404 13.4405H10.3503L4.20026 13.1478L4.07109 13.0181V12.2457C4.07109 12.1665 4.03932 12.0905 3.98359 12.0348L3.80443 11.8556L4.06224 10.8249C4.07943 10.7556 4.07161 10.6827 4.03932 10.6186L3.78828 10.116L3.88099 9.68945L4.30651 9.14414C4.34766 9.09154 4.36953 9.02695 4.36953 8.96029V8.66185C4.37005 8.54779 4.30495 8.44362 4.20286 8.39362L4.07109 8.32904V8.06445C4.07109 7.99622 4.04766 7.92956 4.00443 7.87643L3.64505 7.43268L3.23359 5.01289L2.95078 2.81706C2.94922 2.80352 2.94661 2.78945 2.94297 2.77591L2.57786 1.45352V0.896224Z" fill="black"/>
                                                    </svg>
                                                </span>
                                                <p class="mr-2 w-20 text-[12px] font-normal text-dark">Floor Area</p>
                                                <p class="text-[12px] font-normal text-dark">50sqm</p>
                                            </div>
                                            <div class="flex items-center">
                                                <span class="mr-5 block w-[22px]">
                                                    <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.24074 2.61328C3.55168 2.61328 2.9873 3.17766 2.9873 3.86672V12.021C2.9873 12.0305 2.9873 12.0399 2.98803 12.0487C2.99533 13.2321 3.42043 13.9686 3.8171 14.5454C4.21668 15.1265 4.55501 15.5319 4.55501 16.2028V18.2933C4.55501 18.4377 4.67241 18.5543 4.81678 18.5543H11.6112C11.7023 18.5551 11.7869 18.5077 11.8343 18.4296C11.8824 18.3516 11.8861 18.2546 11.8438 18.1737L10.9666 16.4638H11.038C13.2241 16.4638 15.0083 14.6314 15.0083 12.4016V12.169C15.3139 12.0159 15.5312 11.722 15.5312 11.3677C15.5312 10.8499 15.0703 10.4533 14.5417 10.4533H7.69116V3.86672C7.69116 3.17766 7.12678 2.61328 6.43772 2.61328H4.24074ZM13.9635 2.61328C13.8191 2.61328 13.7017 2.72995 13.7017 2.87432V6.27224C13.7017 6.41661 13.8191 6.53328 13.9635 6.53328H13.9788V8.36276C13.9788 8.44661 14.0189 8.52536 14.0874 8.57495C14.156 8.6238 14.2435 8.63693 14.3229 8.60995L15.2774 8.28984L16.2319 8.60995C16.2858 8.62818 16.3442 8.62818 16.3981 8.60995L17.3526 8.28984L18.3078 8.60995C18.3873 8.63693 18.4748 8.6238 18.5433 8.57495C18.6112 8.52536 18.652 8.44661 18.652 8.36276V6.53328H18.6673C18.8117 6.53328 18.9283 6.41661 18.9283 6.27224V2.87432C18.9283 2.72995 18.8117 2.61328 18.6673 2.61328H13.9635ZM4.24074 3.13609H6.43772C6.84387 3.13609 7.16835 3.45984 7.16835 3.86672V10.4533H3.51012V3.86672C3.51012 3.45984 3.83387 3.13609 4.24074 3.13609ZM14.2245 3.13609H18.4063V6.00755C18.3326 6.00318 18.2612 6.03016 18.2087 6.0812C18.2057 6.08339 18.2028 6.0863 18.2006 6.08922C18.1423 6.14901 18.1153 6.23286 18.1292 6.31453V7.99891L17.4365 7.7663C17.3825 7.74807 17.3235 7.74807 17.2695 7.7663L16.315 8.08714L15.3605 7.7663C15.3066 7.74807 15.2482 7.74807 15.1943 7.7663L14.5016 7.99891V6.31672C14.5162 6.23068 14.487 6.14391 14.425 6.08339C14.4214 6.08047 14.4177 6.07755 14.4148 6.07464C14.363 6.02797 14.2945 6.00391 14.2245 6.00755V3.13609ZM15.2701 6.01047L15.0608 6.11547L15.0193 6.34589L15.179 6.51724L15.2701 6.53328L15.4794 6.42828L15.5202 6.19786L15.3605 6.02724L15.2701 6.01047ZM16.315 6.01047L16.1057 6.11547L16.0649 6.34589L16.2246 6.51724L16.315 6.53328L16.5243 6.42828L16.5658 6.19786L16.4062 6.02724L16.315 6.01047ZM17.3606 6.01047L17.1514 6.11547L17.1098 6.34589L17.2695 6.51724L17.3606 6.53328L17.5699 6.42828L17.6115 6.19786L17.4518 6.02724L17.3606 6.01047ZM3.51012 10.9761H14.5417C14.8144 10.9761 15.0083 11.1679 15.0083 11.3677C15.0083 11.5682 14.8144 11.7599 14.5417 11.7599H13.9635C13.8694 11.7585 13.7812 11.8081 13.7338 11.8897C13.6864 11.9707 13.6864 12.0713 13.7338 12.153C13.7812 12.2346 13.8694 12.2842 13.9635 12.2828H14.4863V12.4016C14.4863 14.3529 12.9324 15.941 11.038 15.941H10.3045C10.2104 15.9403 10.1229 15.9891 10.0755 16.0708C10.0274 16.1524 10.0274 16.2531 10.0755 16.334C10.1229 16.4157 10.2104 16.4653 10.3045 16.4638H10.3789L11.1831 18.0322H5.07783V16.4638L5.2871 16.3588L5.32866 16.1284L5.16897 15.9578L5.07783 15.941L5.06178 15.9497C4.98376 15.241 4.5922 14.7495 4.24803 14.2486C3.89585 13.7367 3.57283 13.1949 3.52105 12.2777L3.71939 12.1778L3.76022 11.9473L3.60053 11.776L3.51012 11.7599V10.9761ZM4.55501 11.7599L4.34574 11.8649L4.30491 12.0954L4.4646 12.266L4.55501 12.2828L4.76428 12.1778L4.80585 11.9473L4.64616 11.776L4.55501 11.7599ZM5.60064 11.7599L5.39137 11.8649L5.3498 12.0954L5.50949 12.266L5.60064 12.2828L5.80991 12.1778L5.85147 11.9473L5.69178 11.776L5.60064 11.7599ZM6.64626 11.7599L6.43699 11.8649L6.39543 12.0954L6.55512 12.266L6.64626 12.2828L6.85553 12.1778L6.89637 11.9473L6.73668 11.776L6.64626 11.7599ZM7.69116 11.7599L7.48189 11.8649L7.44105 12.0954L7.60074 12.266L7.69116 12.2828L7.90043 12.1778L7.94199 11.9473L7.7823 11.776L7.69116 11.7599ZM8.73678 11.7599L8.52751 11.8649L8.48595 12.0954L8.64564 12.266L8.73678 12.2828L8.94605 12.1778L8.98689 11.9473L8.8272 11.776L8.73678 11.7599ZM9.78168 11.7599L9.57241 11.8649L9.53158 12.0954L9.69126 12.266L9.78168 12.2828L9.99095 12.1778L10.0325 11.9473L9.87283 11.776L9.78168 11.7599ZM10.8273 11.7599L10.618 11.8649L10.5765 12.0954L10.7362 12.266L10.8273 12.2828L11.0366 12.1778L11.0781 11.9473L10.9185 11.776L10.8273 11.7599ZM11.8729 11.7599L11.6637 11.8649L11.6221 12.0954L11.7818 12.266L11.8729 12.2828L12.0822 12.1778L12.123 11.9473L11.9633 11.776L11.8729 11.7599ZM12.9178 11.7599L12.7086 11.8649L12.6677 12.0954L12.8274 12.266L12.9178 12.2828L13.1271 12.1778L13.1687 11.9473L13.009 11.776L12.9178 11.7599ZM6.12345 15.941L5.91418 16.0467L5.87262 16.2764L6.0323 16.4478L6.12345 16.4638L6.33272 16.3588L6.37355 16.1284L6.21387 15.9578L6.12345 15.941ZM7.16835 15.941L6.95908 16.0467L6.91824 16.2764L7.07793 16.4478L7.16835 16.4638L7.37762 16.3588L7.41918 16.1284L7.25949 15.9578L7.16835 15.941ZM8.21397 15.941L8.0047 16.0467L7.96314 16.2764L8.12283 16.4478L8.21397 16.4638L8.42324 16.3588L8.4648 16.1284L8.30512 15.9578L8.21397 15.941ZM9.2596 15.941L9.05033 16.0467L9.00876 16.2764L9.16845 16.4478L9.2596 16.4638L9.46887 16.3588L9.5097 16.1284L9.35001 15.9578L9.2596 15.941Z" fill="black"/>
                                                    </svg>
                                                </span>
                                                <p class="mr-2 w-20 text-[12px] font-normal text-dark">Toilet & Bath:</p>
                                                <p class="text-[12px] font-normal text-dark">1 (One)</p>
                                            </div>
                                            <div class="flex items-center">
                                                <span class="mr-5 block w-[22px]">
                                                    <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1.98047 1.19434V13.7381H14.5242V1.19434H10.0445V1.79173H13.9268V7.76465H11.8362V8.36204H13.9268V13.1407H7.95391V8.36204H10.0445V7.76465H5.26589V8.36204H7.35651V13.1407H2.57786V1.79173H6.36068L8.67057 3.52402L9.02891 3.0459L6.56016 1.19434H1.98047Z" fill="black"/>
                                                    </svg>
                                                </span>
                                                <p class="mr-2 w-20 text-[12px] font-normal text-dark">Lot Area:</p>
                                                <p class="text-[12px] font-normal text-dark">70sqm (typical)</p>
                                            </div>
                                            <div class="flex items-center">
                                                <span class="mr-5 block w-[22px]">
                                                    <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_3830_14049)">
                                                        <path d="M5.56616 4.38086C4.9363 4.38086 4.3363 4.6503 3.91824 5.12114L1.30713 8.05794C0.746018 8.38989 0.370324 8.99475 0.365463 9.68086L0.346713 12.3225C0.341851 12.9746 0.876574 13.5149 1.52866 13.5156L2.39671 13.5163C2.46199 13.9739 2.64532 14.417 2.96338 14.7753C3.36824 15.2302 3.99185 15.5309 4.75505 15.5309C5.93491 15.5309 6.87727 14.6503 7.06754 13.5225L13.5821 13.5316C13.6502 13.9822 13.8002 14.4218 14.1141 14.7753C14.5189 15.2302 15.1419 15.5309 15.905 15.5309C17.0849 15.5309 18.0682 14.6656 18.2585 13.5385L19.1196 13.5392C19.7585 13.5399 20.2856 13.0135 20.2856 12.3746V10.1197C20.2856 9.14405 19.5752 8.30586 18.6127 8.14544L15.1585 7.56975L13.4606 5.14266C13.1266 4.66558 12.5787 4.38086 11.996 4.38086H5.56616ZM5.56616 5.17739H8.73699V7.56628H3.93352L2.66893 7.7253L4.51338 5.6503C4.78074 5.34892 5.16338 5.17739 5.56616 5.17739ZM9.53352 5.17739H11.996C12.3203 5.17739 12.6224 5.33433 12.8078 5.59961L14.1849 7.56628H9.53352V5.17739ZM3.98352 8.3628H15.0759L18.4821 8.93086C19.0662 9.02808 19.4891 9.52808 19.4891 10.1197V12.3746C19.4891 12.5822 19.3287 12.7427 19.121 12.7427L18.2578 12.742C18.0662 11.6163 17.0835 10.7524 15.905 10.7524C15.1419 10.7524 14.5189 11.0531 14.1141 11.5086C13.8044 11.8566 13.655 12.2906 13.5849 12.735L7.0606 12.726C6.85574 11.6156 5.92241 10.7524 4.75505 10.7524C3.99185 10.7524 3.36824 11.0531 2.96338 11.5086C2.65643 11.8545 2.47171 12.2788 2.40088 12.7197L1.52935 12.7191C1.30991 12.7191 1.14116 12.5489 1.14324 12.3288L1.1613 9.68642V9.68572C1.16616 9.12669 1.57796 8.66419 2.13213 8.59475L3.98352 8.3628ZM4.75505 11.5489C5.63907 11.5489 6.3481 12.2572 6.3481 13.142C6.3481 14.026 5.63907 14.7343 4.75505 14.7343C4.19046 14.7343 3.81824 14.5371 3.55921 14.2461C3.30088 13.9552 3.16199 13.551 3.16199 13.142C3.16199 12.7322 3.30088 12.3281 3.55921 12.0371C3.81824 11.7461 4.19046 11.5489 4.75505 11.5489ZM15.905 11.5489C16.7898 11.5489 17.4981 12.2572 17.4981 13.142C17.4981 14.026 16.7898 14.7343 15.905 14.7343C15.3412 14.7343 14.9682 14.5371 14.7099 14.2461C14.4509 13.9552 14.312 13.551 14.312 13.142C14.312 12.7322 14.4509 12.3281 14.7099 12.0371C14.9682 11.7461 15.3412 11.5489 15.905 11.5489Z" fill="black"/>
                                                        </g>
                                                        <defs>
                                                        <clipPath id="clip0_3830_14049">
                                                        <rect width="20" height="20" fill="white" transform="translate(0.374023)"/>
                                                        </clipPath>
                                                        </defs>
                                                    </svg>
                                                </span>
                                                <p class="mr-2 w-20 text-[12px] font-normal text-dark">Carport:</p>
                                                <p class="text-[12px] font-normal text-dark">1 (One)</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-8 max-sm:mt-6 max-sm:border-t max-sm:border-[#D9D9D9] max-sm:pt-5">
                                        <h2 class="text-base font-medium text-dark">Project Details</h2>
                                        <div class="mt-10 max-sm:mt-5">
                                            <div class="active group">
                                                <h2 class="flex cursor-pointer items-start justify-between gap-1 bg-[#F3F4F6] px-4 py-3 text-xl font-bold text-[#111827] max-[380px]:text-base">Amenities <span class="icon-arrow-down mt-1 block text-[24px] text-secondary group-[.active]:rotate-180"></span></h2>
                                                <div class="hidden bg-white p-5 group-[.active]:block">
                                                    <ul class="list-inside list-disc">
                                                        <li class="text-base font-normal text-[#0F0E0E]">Multi-Purpose Hall</li>
                                                        <li class="text-base font-normal text-[#0F0E0E]">Swimming Pool</li>
                                                        <li class="text-base font-normal text-[#0F0E0E]">Playing Courts</li>
                                                        <li class="text-base font-normal text-[#0F0E0E]">Gardens, Chapel</li>
                                                        <li class="text-base font-normal text-[#0F0E0E]">Open spaces</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="group mt-1">
                                                <h2 class="flex cursor-pointer items-start justify-between gap-1 bg-[#F3F4F6] px-4 py-3 text-xl font-bold text-[#111827] max-[380px]:text-base">Accessibility <span class="icon-arrow-down mt-1 block text-[24px] text-secondary group-[.active]:rotate-180"></span></h2>
                                                <div class="hidden bg-white p-5 group-[.active]:block">
                                                    <ul class="list-inside list-disc">
                                                        <li class="text-base font-normal text-[#0F0E0E]">Multi-Purpose Hall</li>
                                                        <li class="text-base font-normal text-[#0F0E0E]">Swimming Pool</li>
                                                        <li class="text-base font-normal text-[#0F0E0E]">Playing Courts</li>
                                                        <li class="text-base font-normal text-[#0F0E0E]">Gardens, Chapel</li>
                                                        <li class="text-base font-normal text-[#0F0E0E]">Open spaces</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="group mt-1">
                                                <h2 class="flex cursor-pointer items-start justify-between gap-1 bg-[#F3F4F6] px-4 py-3 text-xl font-bold text-[#111827] max-[380px]:text-base">Educational Institutions <span class="icon-arrow-down mt-1 block text-[24px] text-secondary group-[.active]:rotate-180"></span></h2>
                                                <div class="hidden bg-white p-5 group-[.active]:block">
                                                    <ul class="list-inside list-disc">
                                                        <li class="text-base font-normal text-[#0F0E0E]">Multi-Purpose Hall</li>
                                                        <li class="text-base font-normal text-[#0F0E0E]">Swimming Pool</li>
                                                        <li class="text-base font-normal text-[#0F0E0E]">Playing Courts</li>
                                                        <li class="text-base font-normal text-[#0F0E0E]">Gardens, Chapel</li>
                                                        <li class="text-base font-normal text-[#0F0E0E]">Open spaces</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="group mt-1">
                                                <h2 class="flex cursor-pointer items-start justify-between gap-1 bg-[#F3F4F6] px-4 py-3 text-xl font-bold text-[#111827] max-[380px]:text-base">Commercial Establishments <span class="icon-arrow-down mt-1 block text-[24px] text-secondary group-[.active]:rotate-180"></span></h2>
                                                <div class="hidden bg-white p-5 group-[.active]:block">
                                                    <ul class="list-inside list-disc">
                                                        <li class="text-base font-normal text-[#0F0E0E]">Multi-Purpose Hall</li>
                                                        <li class="text-base font-normal text-[#0F0E0E]">Swimming Pool</li>
                                                        <li class="text-base font-normal text-[#0F0E0E]">Playing Courts</li>
                                                        <li class="text-base font-normal text-[#0F0E0E]">Gardens, Chapel</li>
                                                        <li class="text-base font-normal text-[#0F0E0E]">Open spaces</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Mobile button -->
                            <div
                                id="show-div"
                                class="fixed bottom-0 z-[9999] -ml-[15px] w-full border-t-2 bg-white p-[15px] max-md:p-[10px] md:hidden"
                                >
                                <div class="flex items-center gap-2">
                                    <button
                                        type="button"
                                        @click="productLoan()"
                                        class="mx-auto block h-full w-full text-nowrap rounded-full bg-[#ffe196ad] p-[10px] text-center text-[10px] font-normal tracking-tighter text-[#ff6200] underline underline-offset-2 md:text-[15px]"
                                        >
                                        @lang('enclaves::app.shop.product.load-calculator')
                                    </button>

                                    <!-- Buy Now Button -->
                                    {!! $product->button_text != '0' && $product->button_text ? $product->button_information : '' !!}

                                    {!! view_render_event('bagisto.shop.products.view.buy_now.before', ['product' => $product]) !!}
                                        <button
                                            @click="is_buy_now=1; is_kyc_process=1;"
                                            class="mx-auto flex items-center gap-2 divide-x rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] text-center text-[10px] font-normal text-[#C38400]"
                                            style="color: {{ $product->button_color_text }}; background-color: {{ $product->button_background_color }}; border: {{ $product->button_border_color != '0' && $product->button_border_color ? '3px solid ' . $product->button_border_color: '' }}"
                                            {{ ! $product->isSaleable(1) ? 'disabled' : '' }}
                                        >
                                            <span class="max-md:whitespace-wrap flex flex-col gap-1 whitespace-nowrap py-[10px] pl-[10px] text-left text-[10px] font-normal tracking-tighter text-white">
                                                <p class="processing_fee_btn text-[15px]">{{ core()->formatPrice($product->processing_fee) }}</p>

                                                <span>
                                                    @lang('enclaves::app.shop.product.processing')
                                                </span>
                                            </span>

                                            <span class="min-md:whitespace-nowrap max-md:whitespace-wrap text-nowrap px-[10px] py-[10px] tracking-tighter text-white underline underline-offset-2">
                                                @lang($product->button_text != '0' && $product->button_text ? $product->button_text : 'enclaves::app.shop.product.reserve-now')
                                            </span>
                                        </button>
                                    {!! view_render_event('bagisto.shop.products.view.buy_now.after', ['product' => $product]) !!}
                                </div>
                            </div>

                            <!-- Quick Guide -->
                            <x-enclaves-shop::modal.product-pricing ref="productQuickGuideModal">
                                <!-- Modal Header -->
                                <x-slot:header>
                                    <div class="flex w-full justify-center">
                                        <h2 class="text-[25px] font-bold max-md:text-[10px]">
                                            @lang('Quick Guide')
                                        </h2>
                                    </div>
                                </x-slot:header>

                                <!-- Modal Content Id -->
                                <x-slot:content>
                                    <div class="flex h-[320px] flex-col gap-2 overflow-auto px-[50px] max-md:px-[10px] md:gap-5">
                                        <div class="flex items-start gap-5">
                                            <img
                                                class="h-[90px] w-[90px] rounded-full object-cover max-md:h-[50px] max-md:w-[60px]"
                                                src="{{ bagisto_asset('images/phone1.png') }}" />

                                                <div class="flex h-[24px] w-[24px] min-w-[24px] items-center justify-center rounded-full bg-[#1973E8] text-[15px] font-normal text-white max-md:h-[20px] max-md:w-[20px] max-md:min-w-[20px] max-md:text-[10px]">
                                                    @lang('1')
                                                </div>
                                            <div class="flex flex-col gap-2">
                                                <p class="text-[20px] font-bold max-md:text-[15px]">@lang('Register')</p>
                                                <p class="text-[15px] font-normal max-md:text-[10px]">@lang('Provide your email address and mobile number.')</p>
                                            </div>
                                        </div>

                                        <div class="flex items-start gap-5">
                                            <img
                                                class="h-[90px] w-[90px] rounded-full object-cover max-md:h-[50px] max-md:w-[60px]"
                                                src="{{ bagisto_asset('images/phone2.png') }}"
                                            />
                                                <div class="flex h-[24px] w-[24px] min-w-[24px] items-center justify-center rounded-full bg-[#1973E8] text-[15px] font-normal text-white max-md:h-[20px] max-md:w-[20px] max-md:min-w-[20px] max-md:text-[10px]">
                                                    @lang('2')
                                                </div>
                                            <div class="flex flex-col gap-3">
                                                <p class="text-[20px] font-bold max-md:text-[15px]">@lang('Verify your Identity')</p>
                                                <p class="text-[15px] font-normal max-md:text-[10px]">@lang('Scan a valid Government Id and complete with a selfie')</p>
                                            </div>
                                        </div>

                                        <div class="flex items-start gap-5">
                                            <img
                                                class="h-[90px] w-[90px] rounded-full object-cover max-md:h-[50px] max-md:w-[60px]"
                                                src="{{ bagisto_asset('images/phone3.png') }}"
                                            />
                                                <div class="flex h-[24px] w-[24px] min-w-[24px] items-center justify-center rounded-full bg-[#1973E8] text-[15px] font-normal text-white max-md:h-[20px] max-md:w-[20px] max-md:min-w-[20px] max-md:text-[10px]">
                                                    @lang('3')
                                                </div>
                                            <div class="flex flex-col gap-3">
                                                <p class="text-[20px] font-bold max-md:text-[15px]">@lang('Complete Data Form')</p>
                                                <p class="text-[15px] font-normal max-md:text-[10px]">@lang('Fill-out the Buyer Information Sheet.')</p>
                                            </div>
                                        </div>

                                        <div class="flex items-start gap-5">
                                            <img
                                                class="h-[90px] w-[90px] rounded-full object-cover max-md:h-[50px] max-md:w-[60px]"
                                                src="{{ bagisto_asset('images/phone4.png') }}"
                                            />
                                                <div class="flex h-[24px] w-[24px] min-w-[24px] items-center justify-center rounded-full bg-[#1973E8] text-[15px] font-normal text-white max-md:h-[20px] max-md:w-[20px] max-md:min-w-[20px] max-md:text-[10px]">
                                                    @lang('4')
                                                </div>
                                            <div class="flex flex-col gap-3">
                                                <p class="text-[20px] font-bold max-md:text-[15px]">@lang('Pay Online')</p>
                                                <p class="text-[15px] font-normal max-md:text-[10px]">@lang('Select from available payment option')</p>
                                            </div>
                                        </div>

                                        <div class="flex items-start gap-5">
                                            <img
                                                class="h-[90px] w-[90px] rounded-full object-cover max-md:h-[50px] max-md:w-[60px]"
                                                src="{{ bagisto_asset('images/phone5.png') }}"
                                            />
                                                <div class="flex h-[24px] w-[24px] min-w-[24px] items-center justify-center rounded-full bg-[#1973E8] text-[15px] font-normal text-white max-md:h-[20px] max-md:w-[20px] max-md:min-w-[20px] max-md:text-[10px]">
                                                    @lang('5')
                                                </div>
                                            <div class="flex flex-col gap-3">
                                                <p class="text-[20px] font-bold max-md:text-[15px]">@lang('Get Qualified')</p>
                                                <p class="text-[15px] font-normal max-md:text-[10px]">@lang('Wait for notification via SMS and Email')</p>
                                            </div>
                                        </div>
                                    </div>
                                </x-slot:content>

                                <!-- Modal Footer -->
                                <x-slot:footer>
                                    <button
                                        type="button"
                                        @click="productQuickGuideRedirect()"
                                        class="mx-auto flex w-full items-center justify-center gap-2 divide-x rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] p-[15px] text-center text-[15px] font-normal text-white max-md:p-[10px]"
                                    >
                                        @lang('enclaves::app.shop.product.reserve-now')
                                    </button>
                                </x-slot:footer>
                            </x-enclaves-shop::modal.product-pricing>

                            <!-- Product Loan Model -->
                            <x-enclaves-shop::modal.product-pricing ref="productLoanModal">
                                <!-- Modal Header -->
                                <x-slot:header>
                                    <div class="flex w-full justify-center">
                                        <h2 class="text-2xl text-[25px] font-bold max-md:text-base">
                                            @lang('Loan Calculator')
                                        </h2>
                                    </div>
                                </x-slot:header>

                                <!-- Modal Content Id -->
                                <x-slot:content>
                                    <div class="flex h-[320px] flex-col gap-2 overflow-auto px-[50px] max-md:px-[10px]">
                                        <hr class="mb-2 mt-0 h-px w-full border-t border-[#d9d9d9]" />

                                        <span class="flex flex-col gap-0.5 py-2.5 md:hidden">
                                            <p class="text-[15px] font-normal text-[#8b8b8b]">
                                                @lang('Selling price')
                                            </p>

                                            <span class="text-sm font-semibold text-black">
                                                @lang('₱10,000')
                                            </span>

                                            <p class="text-xs font-normal text-[#8b8b8b]">
                                                @lang('Total Contract Price')
                                            </p>
                                        </span>

                                        <p class="text-[15px] font-normal text-[#8b8b8b]">
                                            @lang('Sample Computation')
                                        </p>

                                        <div class="flex w-full items-center justify-between gap-4 rounded-full border border-[#D9D9D9] bg-white px-[20px] py-[10px] max-md:px-[10px]">
                                            <p class="text-[20px] font-normal max-md:text-[14px]">
                                                @lang('Years')
                                            </p>

                                            <p class="flex items-center gap-1.5 text-[20px] font-normal text-[#CC035C] max-md:text-[14px]">
                                                @lang('30 years')

                                                <svg
                                                    width="20"
                                                    height="12"
                                                    viewBox="0 0 20 12"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <path
                                                    d="M9.66732 11.3781L0.703827 2.36689C0.0751711 1.73489 0.52645 0.659683 1.41787 0.663007L18.8104 0.727855C19.6853 0.731117 20.1345 1.77702 19.5344 2.41372L11.1039 11.3586C10.7164 11.7697 10.0657 11.7786 9.66732 11.3781Z"
                                                    fill="#CC035C"
                                                    />
                                                </svg>
                                            </p>
                                        </div>

                                        <div class="mb-[15px] mt-[15px] flex items-center gap-2 rounded-[10px] bg-[#f6faff] px-6 py-6 max-md:mb-[10px] max-md:mt-[10px]">
                                            <div class="flex flex-col gap-px">
                                                <p class="text-[15px] font-bold text-[#000]">@lang('₱840,000')</p>
                                                <p class="text-nowrap text-[15px] font-normal text-[#b8b8b8]">@lang('Total Contract Price')</p>
                                            </div>

                                            <div class="flex flex-col gap-px">
                                                <p class="text-[15px] font-bold text-[#000]">@lang('₱80,000')</p>
                                                <p class="text-nowrap text-[15px] font-normal text-[#b8b8b8]">@lang('Loan Consulting Fee')</p>
                                            </div>

                                            <div class="hidden flex-col gap-px md:flex">
                                                <p class="text-[15px] font-bold text-[#000]">@lang('₱60,000')</p>
                                                <p class="text-nowrap text-[15px] font-normal text-[#b8b8b8]">@lang('Monthly DP')</p>
                                            </div>
                                        </div>

                                        <div class="flex max-w-full items-center gap-8 md:hidden">
                                            <div class="flex w-full flex-col gap-2.5">
                                                <p class="text-[15px] font-normal text-[#b8b8b8] md:text-xl">Reservation Date</p>

                                                <p class="w-full rounded-full bg-[#f6faff] px-[18px] py-[19px] text-sm font-bold text-[#000] md:text-xl">May 27, 2024</p>
                                            </div>

                                            <div class="flex w-full flex-col gap-2.5">
                                                <p class="text-[15px] font-normal text-[#b8b8b8] md:text-xl">Reservation Date</p>

                                                <p class="w-full rounded-full bg-[#f6faff] px-[18px] py-[19px] text-sm font-bold text-[#000] md:text-xl">May 27, 2024</p>
                                            </div>
                                        </div>

                                        <div class="ml-[38px] hidden max-w-fit items-center gap-8 md:flex">
                                            <div class="flex flex-col gap-px">
                                                <p class="text-[15px] font-bold text-[#000]">@lang('May 27, 2024')</p>
                                                <p class="text-[15px] font-normal text-[#b8b8b8]">@lang('Reservation Date')</p>
                                            </div>

                                            <div class="flex flex-col gap-px">
                                                <p class="text-[15px] font-bold text-[#000]">@lang('May 27, 2024')</p>
                                                <p class="text-[15px] font-normal text-[#b8b8b8]">@lang('Reservation Date')</p>
                                            </div>
                                        </div>

                                        <p class="flex items-center gap-px pt-[23px] text-[15px] font-normal tracking-tighter text-[#1973e8]">
                                            <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M13.0001 2.16675C7.02623 2.16675 2.16675 7.02623 2.16675 13.0001C2.16675 18.9739 7.02623 23.8334 13.0001 23.8334C18.9739 23.8334 23.8334 18.9739 23.8334 13.0001C23.8334 7.02623 18.9739 2.16675 13.0001 2.16675ZM13.0001 3.79175C18.0951 3.79175 22.2084 7.90503 22.2084 13.0001C22.2084 18.0951 18.0951 22.2084 13.0001 22.2084C7.90503 22.2084 3.79175 18.0951 3.79175 13.0001C3.79175 7.90503 7.90503 3.79175 13.0001 3.79175ZM13.0001 7.58341C12.402 7.58341 11.9167 8.06866 11.9167 8.66675C11.9167 9.26484 12.402 9.75008 13.0001 9.75008C13.5982 9.75008 14.0834 9.26484 14.0834 8.66675C14.0834 8.06866 13.5982 7.58341 13.0001 7.58341ZM12.9874 11.3638C12.5388 11.3708 12.1805 11.739 12.1876 12.1876V18.1459C12.1833 18.4393 12.3371 18.7116 12.591 18.8597C12.8435 19.0064 13.1567 19.0064 13.4092 18.8597C13.6631 18.7116 13.8168 18.4393 13.8126 18.1459V12.1876C13.8154 11.9675 13.7294 11.7559 13.5742 11.6008C13.419 11.4456 13.2074 11.3596 12.9874 11.3638Z"
                                                    fill="#1973E8"
                                                />
                                            </svg>

                                            @lang('Final computation is based on approve amount from Pag-IBIG')
                                        </p>

                                        <hr class="mb-2 mt-1 h-px w-full border-t border-[#d9d9d9]" />
                                    </div>
                                </x-slot:content>

                                <!-- Modal Footer -->
                                <x-slot:footer class="px-1 py-1">
                                    <div class="mb-3 flex items-center gap-2">
                                        <div class="mx-auto flex w-full flex-col items-start justify-center gap-[7px] rounded-full px-3 text-[15px] font-normal leading-3 text-white lg:mt-auto">
                                            <span class="text-xl font-semibold text-black">
                                                @lang('₱10,000')
                                            </span>

                                            <span class="whitespace-nowrap text-[15px] font-normal tracking-tighter text-[#8b8b8b]">
                                                @lang('Loan Consulting Fee')
                                            </span>
                                        </div>

                                        <button
                                            v-if="isAdding"
                                            style="color: {{ $product->button_color_text }}; background-color: {{ $product->button_background_color }}; border: {{ $product->button_border_color != '0' && $product->button_border_color ? '3px solid ' . $product->button_border_color: '' }}"
                                            class="mx-auto flex w-full cursor-not-allowed items-center justify-center gap-2 divide-x rounded-full bg-[linear-gradient(268.1deg,_#f58fbc_7.47%,_#fde4af_98.92%)] p-[10px] text-center text-[15px] font-normal text-white"
                                            disabled
                                        >
                                            @lang($product->button_text != '0' && $product->button_text ? $product->button_text : 'enclaves::app.shop.product.reserve-now')
                                        </button>

                                        <button
                                            v-else
                                            @click="is_buy_now=1; is_kyc_process=1;"
                                            style="color: {{ $product->button_color_text }}; background-color: {{ $product->button_background_color }}; border: {{ $product->button_border_color != '0' && $product->button_border_color ? '3px solid ' . $product->button_border_color: '' }}"
                                            class="mx-auto flex w-full items-center justify-center gap-2 divide-x rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] p-[15px] text-center text-[15px] font-normal text-white"
                                            {{ ! $product->isSaleable(1) ? 'disabled' : '' }}
                                        >
                                            @lang($product->button_text != '0' && $product->button_text ? $product->button_text : 'enclaves::app.shop.product.reserve-now')
                                        </button>
                                    </div>
                                </x-slot:footer>
                            </x-enclaves-shop::modal.product-pricing>
                        </form>
                    </x-shop::form>
                </div>
            </script>

            <script type="module">
                app.component('v-product', {
                    template: '#v-product-template',

                    props: ['productId'],

                    data() {
                        return {
                            isWishlist: Boolean("{{ (boolean) auth()->guard()->user()?->wishlist_items->where('channel_id', core()->getCurrentChannel()->id)->where('product_id', $product->id)->count() }}"),

                            isCustomer: "{{ auth()->guard('customer')->check() }}",

                            is_buy_now: 0,

                            is_kyc_process: 0,

                            qty: 1,

                            product: @json($product),

                            isAdding: 0,
                        }
                    },

                    methods: {
                        productQuickGuideRedirect() {
                            if (this.product.ekyc_redirect_uri) {
                                window.location.href = this.product.ekyc_redirect_uri;
                            } else {
                                this.$emitter.emit('add-flash', { type: 'warning', message: 'URL Not Found!' });
                            }
                        },

                        productLoan() {
                            this.$refs.productLoanModal.toggle();
                        },

                        addToCart(params) {
                            this.isAdding = 1;

                            let formData = new FormData(this.$refs.formData);

                            this.$axios.post('{{ route("shop.api.checkout.cart.store") }}', formData, {
                                    headers: {
                                        'Content-Type': 'multipart/form-data'
                                    }
                                })
                                .then(response => {
                                    this.isAdding = 0;

                                    if (response.data.message) {
                                        this.$emitter.emit('update-mini-cart', response.data.data);

                                        this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });

                                        this.$refs.productQuickGuideModal.toggle();

                                        /**
                                         *
                                         * NOTE: FOR FUTURE USE. DON'T REMOVE IT.
                                            if (this.product.ekyc_redirect_uri) {
                                                window.location.href = this.product.ekyc_redirect_uri;
                                            } else {
                                                if (response.data.redirect && ! this.is_kyc_process) {
                                                    window.location.href = response.data.redirect;
                                                } else {
                                                    window.location.href = response.data.ekyc_redirect;
                                                }
                                            }
                                        **/
                                    } else {
                                        this.$emitter.emit('add-flash', { type: 'warning', message: response.data.data.message });
                                    }
                                })
                                .catch(error => {});
                        },

                        addToWishlist() {
                            if (this.isCustomer) {
                                this.$axios.post("{{ route('shop.api.customers.account.wishlist.store') }}", {
                                    product_id: "{{ $product->id }}"
                                })
                                .then(response => {
                                    this.isWishlist = ! this.isWishlist;

                                    this.$emitter.emit('add-flash', { type: 'success', message: response.data.data.message });
                                })
                                .catch(error => {});
                            } else {
                                window.location.href = "{{ route('shop.customer.session.index')}}";
                            }
                        },

                        addToCompare(productId) {
                            /**
                            * This will handle for customers.
                            */
                            if (this.isCustomer) {
                                this.$axios.post('{{ route("shop.api.compare.store") }}', {
                                        'product_id': productId
                                    })
                                    .then(response => {
                                        this.$emitter.emit('add-flash', { type: 'success', message: response.data.data.message });
                                    })
                                    .catch(error => {
                                        if ([400, 422].includes(error.response.status)) {
                                            this.$emitter.emit('add-flash', { type: 'warning', message: error.response.data.data.message });

                                            return;
                                        }

                                        this.$emitter.emit('add-flash', { type: 'error', message: error.response.data.message});
                                    });

                                return;
                            }

                            /**
                            * This will handle for guests.
                            */
                            let existingItems = this.getStorageValue(this.getCompareItemsStorageKey()) ?? [];

                            if (existingItems.length) {
                                if (! existingItems.includes(productId)) {
                                    existingItems.push(productId);

                                    this.setStorageValue(this.getCompareItemsStorageKey(), existingItems);

                                    this.$emitter.emit('add-flash', { type: 'success', message: "@lang('shop::app.products.view.add-to-compare')" });
                                } else {
                                    this.$emitter.emit('add-flash', { type: 'warning', message: "@lang('shop::app.products.view.already-in-compare')" });
                                }
                            } else {
                                this.setStorageValue(this.getCompareItemsStorageKey(), [productId]);

                                this.$emitter.emit('add-flash', { type: 'success', message: "@lang('shop::app.products.view.add-to-compare')" });
                            }
                        },

                        getCompareItemsStorageKey() {
                            return 'compare_items';
                        },

                        setStorageValue(key, value) {
                            localStorage.setItem(key, JSON.stringify(value));
                        },

                        getStorageValue(key) {
                            let value = localStorage.getItem(key);

                            if (value) {
                                value = JSON.parse(value);
                            }

                            return value;
                        },
                    },
                });
            </script>
        @endPushOnce
    </div>
</x-shop::layouts>
