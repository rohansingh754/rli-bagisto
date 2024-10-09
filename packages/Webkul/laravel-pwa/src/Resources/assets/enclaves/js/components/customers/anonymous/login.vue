<template>
    <section class="flex flex-col justify-center items-center gap-16 bg-[url(./../images/bg-image-2.png)] bg-cover">
		<img :src="themeAssets + 'images/homefull-logo-large.png'" alt="Log in your Account" class="w-72">
		<div class="bg-white shadow-[0px_4px_40px] shadow-black/5 px-4 pt-9 pb-7 rounded-[10px] w-96 max-w-[95%]">
			<h2 class="font-bold text-[25px] text-center text-dark">Log in your Account</h2>
			<form action="POST" class="mt-16" @submit.prevent="validateBeforeSubmit">
				<label for="email" class="block font-semibold text-[14px] text-dark">{{$t('Email Address')}}</label>
				<div class="relative border-[0.5px] mt-3 border-text-gray rounded-full overflow-hidden">
					<input
                        type="email"
                        name="email"
                        v-model="user.email"
                        v-validate="'required|email'"
                        placeholder="Enter you email"
                        :data-vv-as="$t('Email Address')"
                        class="border-0 bg-transparent px-7 py-5 w-full font-normal placeholder:font-normal text-[16px] text-dark placeholder:text-[16px] placeholder:text-text-gray leading-none outline-none"
                        />
				</div>

				<label for="password" class="block mt-7 font-semibold text-[14px] text-dark">Password</label>
				<div class="relative border-[0.5px] mt-3 border-text-gray rounded-full overflow-hidden">
					<input
                        type="password"
                        name="password"
                        v-model="user.password"
                        :placeholder="$t('Enter your password')"
                        v-validate="'required|min:6'"
                        :data-vv-as="$t('Password')"
                        class="border-0 bg-transparent px-7 py-5 w-full font-normal placeholder:font-normal text-[16px] text-dark placeholder:text-[16px] placeholder:text-text-gray leading-none outline-none">
				</div>
				<span
                    class="block mt-9 font-semibold text-[#1973E8] text-[14px]"
                    @click="$emit('onOpenPopup', 'forgot_password')"
                    >
                    {{ $t('Forgot Password?') }}
                </span>
				<button
                    type="submit"
                    :disabled="loading"
                    class="inline-block bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] disabled:opacity-[0.4] mt-9 px-7 py-5 rounded-full w-full font-medium text-[15px] text-center text-white"
                    >
                        Submit
                </button>
			</form>
		</div>
	</section>
</template>

<script>
    import CustomHeader from '../../layouts/custom-header';

    export default {
        name: 'login',

        components: { CustomHeader },

        data () {
            return {
                loading: false,

                user: {
                    'email': '',
                    'password': ''
                },
                themeAssets: window.config.themeAssetsPath,
            }
        },

        mounted () {
            if (JSON.parse(localStorage.getItem('currentUser'))){
                this.$router.push({name: 'home'})
            }
        },

        methods: {
            validateBeforeSubmit () {
                this.loading = true;

                this.$validator.validateAll().then((result) => {
                    if (result) {
                        this.loginCustomer()
                    } else {
                        this.loading = false;
                    }
                });
            },

            loginCustomer () {
                var this_this = this;

                EventBus.$emit('show-ajax-loader');
                this.user.device_name = window.config.device.model;

                this.$http.post("/api/v1/customer/login", this.user)
                    .then(function(response) {
                    this_this.loading = false;
                    EventBus.$emit('hide-ajax-loader');

                    localStorage.setItem('currentUser', JSON.stringify(response.data.data));
                    localStorage.setItem('token', JSON.stringify(response.data.token));

                    this_this.$http.defaults.headers.common['Authorization'] = `Bearer ${response.data.token}`;

                    EventBus.$emit('user-logged-in', response.data);

                    this_this.$router.push({name: 'home'})
                })
                .catch(function (error) {
                    console.error(error);

                    var errors = error.response.data;
                    for (name in errors) {
                        if (errors.hasOwnProperty(name)) {
                            this_this.errors.add(name, errors[name])
                            this_this.$toasted.show(errors[name], { type: 'error' })
                        }
                    }

                    this_this.loading = false;
                })
            }
        }
    }
</script>

<style scoped lang="scss">
    .content {
        position: absolute;
        bottom: 0;
        top: 0;
        width: 100%;
        background: #fff;

        .form-container {
            padding: 24px 16px;
            margin-top: 55px;

            .control-group {
                .forgot-password {
                    font-weight: 600;
                    font-size: 14px;
                    color: #757575;
                    cursor: pointer;
                }
            }
        }
    }
</style>
