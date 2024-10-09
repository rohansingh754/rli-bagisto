<template>
    <section class="fixed inset-0 flex flex-col justify-center items-center gap-16 bg-[url(./../images/bg-image-2.png)] bg-cover">
		<img :src="themeAssets + 'images/homefull-logo-large.png'" alt="" class="w-72">
		<div class="bg-white shadow-[0px_4px_40px] shadow-black/5 px-4 pt-9 pb-7 rounded-[10px] w-96 max-w-[95%]">
			<div class="flex justify-center items-center gap-3">
				<span
                    class="flex justify-center items-center w-9 h-9 transition hover:-translate-x-1"
                    @click="$emit('onOpenPopup', 'login')"
                    >
					<svg width="27" height="19" viewBox="0 0 27 19" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M9.75375 0.597072C9.36641 0.610562 9.00219 0.780145 8.73625 1.05957L1.42875 8.45957L0.411255 9.5002L1.42875 10.5408L8.73625 17.9408C9.31245 18.5286 10.2529 18.5401 10.8406 17.9639C11.4284 17.3877 11.44 16.4473 10.8638 15.8596L6.03063 10.9802H24.6C25.1338 10.9898 25.6291 10.7085 25.8969 10.246C26.1706 9.78733 26.1706 9.21306 25.8969 8.75442C25.6291 8.29192 25.1338 8.01056 24.6 8.0202H6.03063L10.8638 3.14082C11.3089 2.71108 11.4419 2.05202 11.1933 1.4816C10.9447 0.915041 10.3723 0.562384 9.75375 0.597072Z" fill="black"/>
						</svg>
                </span>
				<h2 class="font-bold text-[25px] text-center text-dark">Forgot Password</h2>
			</div>
			<form
                action="POST"
                @submit.prevent="validateBeforeSubmit"
                class="mt-16"
                >
				<label
                    for="email"
                    class="block font-semibold text-[14px] text-dark"
                    >
                    Email Address
                </label>
				<div
                    class="relative border-[0.5px] mt-3 border-text-gray rounded-full overflow-hidden"
                    :style="errors.has('email') ? 'border-color: red;' : ''"
                    >
					<input
                        type="email"
                        name="email"
                        placeholder="Enter you email"
                        class="border-0 bg-transparent px-7 py-5 w-full font-normal placeholder:font-normal text-[16px] text-dark placeholder:text-[16px] placeholder:text-text-gray leading-none outline-none"
                        v-model="user.email"
                        v-validate="'required|email'"
                        :data-vv-as="$t('Email Address')"
                        >
				</div>
				<p class="block mt-3 font-normal text-[14px] text-dark">We will send a link to your email for account verification and account recovery. Please input your email address and await the verification email.</p>
				<button
                    type="submit"
                    class="inline-block bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] disabled:opacity-[0.4] mt-7 px-7 py-5 rounded-full w-full font-medium text-[15px] text-center text-white"
                    :disabled="!user.email"
                    >
                    Continue
                </button>
			</form>
		</div>
	</section>
</template>

<script>
    export default {
        name: 'forgot-password',

        components: {

         },

        data () {
            return {
                loading: false,
                themeAssets: window.config.themeAssetsPath,

                user: {
                    'email': ''
                }
            }
        },

        methods: {
            validateBeforeSubmit () {
                this.loading = true;

                this.$validator.validateAll().then((result) => {
                    if (result) {
                        this.forgotPassword()
                    } else {
                        this.loading = false;
                    }
                });
            },

            forgotPassword () {
                var this_this = this;

                EventBus.$emit('show-ajax-loader');

                this.$http.post("/api/v1/customer/forgot-password", this.user)
                    .then(function(response) {
                        this_this.loading = false;

                        EventBus.$emit('hide-ajax-loader');

                        if (response.data.error) {
                            this_this.$toasted.show(response.data.error, { type: 'error' });
                        } else {
                            this_this.$toasted.show(response.data.message, { type: 'success' });

                            this_this.$emit('onPopClose');
                            this_this.$emit('onOpenPopup', 'login');
                        }
                    })
                    .catch(function (error) {
                        var errors = error.response.data.errors;

                        for (name in errors) {
                            if (errors.hasOwnProperty(name)) {
                                this_this.errors.add(name, errors[name][0]);
                            }
                        }

                        this_this.loading = false;
                    })
            }
        }
    }
</script>

