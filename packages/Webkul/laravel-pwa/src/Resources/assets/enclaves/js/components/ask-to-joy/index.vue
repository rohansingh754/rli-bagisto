<template>
	<div>
		<ask-to-joy-start v-if="step === 1"> </ask-to-joy-start>
		<ask-to-joy-step-2 v-if="step === 2"> </ask-to-joy-step-2>
		<ask-to-joy-step-3 v-if="step === 3"> </ask-to-joy-step-3>
		<ask-to-joy-step-4 v-if="step === 4"> </ask-to-joy-step-4>
	</div>
</template>

<script>
    import AskToJoyStart from './start';
    import AskToJoyStep2 from './step-2';
    import AskToJoyStep3 from './step-3';
    import AskToJoyStep4 from './step-4';

    export default {
        name: 'ask-to-joy',

		components:{
			AskToJoyStart,
			AskToJoyStep2,
			AskToJoyStep3,
			AskToJoyStep4,
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

			EventBus.$on('ask-to-joy-filter-update', function(key, value) {
                this_this.updateParams(key, value);
            });

			EventBus.$on('ask-to-joy-next-step', function() {
                this_this.incrementStep();
            });

			EventBus.$on('ask-to-joy-previous-step', function() {
                this_this.decrementStep();
            });
		},

        methods: {
			closeAskTojoy(){
				EventBus.$emit('drawer-up-toggle');
				this.step = 1;
			},

			incrementStep(){
				this.step = this.step + 1;
			},

			decrementStep(){
				this.step = this.step - 1;
			},

			updateParams(key, value){
				let askToJoy = localStorage.getItem('askToJoy');

				if ( askToJoy === null) {
					askToJoy = {};
					askToJoy[key] = value;
				} else {
					askToJoy = JSON.parse(localStorage.getItem('askToJoy'));
					askToJoy[key] = value;
				}

				localStorage.setItem('askToJoy', JSON.stringify(askToJoy));

				if (this.step < 3) {
					this.incrementStep();
				} else{
					if (this.$route.path !== '/ask-joy-result') {
						this.$router.push('/ask-joy-result');
					} else{
						this.$router.go(0)
					}
				}
			}
        }
    }
</script>

<style lang="scss">
	.ask-joy-step-3 svg{
		width: 15px;
	}
</style>
