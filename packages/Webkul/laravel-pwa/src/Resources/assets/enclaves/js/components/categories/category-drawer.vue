<template>
	<div>
		Hello ji
	</div>
</template>

<script>


    export default {
        name: 'category-drawer',

		components:{

		},

		data() {
			return {
                themeAssets: window.config.themeAssetsPath,
				step:1,
				params: {},
			}
		},

		mounted() {
			let this_this = this;
		},

        methods: {
			closeAskTojoy(){
				EventBus.$emit('drawer-up-toggle');
				this.step = 1;
			},


        }
    }
</script>

<style lang="scss">
	.ask-joy-step-3 svg{
		width: 15px;
	}
</style>
