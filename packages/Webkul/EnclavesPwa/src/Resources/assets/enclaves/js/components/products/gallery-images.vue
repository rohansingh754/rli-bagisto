<template>
	<div>
		<div class="homeful-slider-wrap relative mt-4">
			<div class="homeful-slide active">
                <image-component
                    :src="sliderActiveImage.large_image_url"
                    :alt="'Facade'"
                    :classes="'w-full'"
                    >
                </image-component>
			</div>
		</div>
		<div
            v-if="images"
            class="scrollbar-hide mt-6 overflow-auto">
			<div class="homeful-slider-thumbs flex w-[max-content] gap-3">
				<div
                    v-for="(image, index) in images"
                    :key="index"
                    :class="sliderActiveImage.id === image.id ? 'active' : ''"
                    class="thumb ml-5 w-[75px] cursor-pointer"
                    @click="changeSlideImage(image)"
                    >
                    <image-component
                        :src="image.large_image_url"
                        :alt="'Facade'"
                        :classes="'rounded-[8px] border border-transparent transition hover:border-primary'"
                        >
                    </image-component>
					<p class="mt-[5px] text-[12px] font-normal leading-none text-text-gray transition">Facade</p>
				</div>
			</div>
		</div>
	</div>
</template>

<script>

    import { mapState, mapActions } from 'vuex';
    import ImageComponent           from "../common/image-component";

    export default {
        name: 'gallery-images',

		components: {
			ImageComponent,
		},

        props: ['product'],

		data: function () {
			return {
                themeAssets: window.config.themeAssetsPath,
				images:{},
				sliderActiveImage: {},
			}
        },

		mounted() {
			let this_this = this;
			this.images = this.product.images;
			this.sliderActiveImage = this.product?.images[0] ?? {};

			EventBus.$on('update-product-images', function (newImages) {
				newImages.map((item, index) => {
					item.id = index + 2; // Start with 2
				});

				this_this.images = newImages;
				this_this.sliderActiveImage = this_this.images.length ? this_this.images[0] : {};
            });
        },

		methods: {
			changeSlideImage (Image) {
                this.sliderActiveImage = Image;
            },

        }
    }
</script>
