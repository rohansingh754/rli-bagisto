<template>
	<section>
		<div class="drawer-up" :style="'transform:translate3d(0,'+translate+', 0);'" ref="element">
			<slot></slot>
		</div>

		<div class="overlay" ref="overlay" @click="close" @transitionend="handleZindex($event)"></div>
	</section>
</template>

<script>
	export default {
        name: 'drawer-up',

		data () {
			return {
				speed: '0.3s',

				translate: null,

				active: false,
			}
		},

		mounted() {
			let this_this = this;
			this.translate = '617px';

			EventBus.$on('drawer-up-toggle', function() {
                this_this.handleToggleDrawerAskToJoy();
            });

			EventBus.$on('drawer-up-heigth-update', function(height) {
				this.translate = height;
            });
		},

		methods: {
			handleToggleDrawerAskToJoy () {
				if (this.active) {
					this.close();
				} else {
					this.open();
				}
			},

			handleZindex () {
				let opacity = window.getComputedStyle(this.$refs.overlay).getPropertyValue('opacity');

				if (opacity <= 0) {
					this.$refs.overlay.style.zIndex = -999;
				}
			},

			overlayOpacity (opacity) {
				this.$refs.overlay.style.opacity = opacity;

				if (opacity > 0) {
					this.$refs.overlay.style.zIndex = 999;
				}
			},

			open () {
				this.translate = 0;

				this.$refs.element.style.transform = 'translate3d(' + '0, 0 ,0)';
				this.$refs.element.style.transitionDuration = this.speed;

				this.overlayOpacity(1);

				this.active = true;
			},

			close () {
				this.translate = this.$refs.element.offsetHeight + 'px';

				this.$refs.element.style.transform = 'translate3d(0, '+this.translate+', 0)';
				this.$refs.element.style.transitionDuration = this.speed;

				this.overlayOpacity(0);

				this.active = false;
			}
		}
	}
</script>

<style scoped lang="scss">
	.overlay {
	    position: fixed;
	    z-index: -999;
	    left: 0px;
	    top: 0px;
	    background: rgba(11, 10, 12, 0.35);
	    opacity: 0;
	    width: 100%;
	    height: 100%;
	    transition: opacity 0.3s ease;
	}

	.drawer-up {
	    z-index: 9999;
	    position: fixed;
	    will-change: transform;
	    height: auto;
	    bottom: 0px;
		transition: transform 0.3s ease;
	    background: #fff;
	    width: 100%;
		overflow-y: auto;
		overflow-x: hidden;
		word-wrap: break-word;
		border-radius: 40px 40px 0px 0px;
		padding-top: 2px;
	}
</style>
