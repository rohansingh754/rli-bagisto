<template>
	<div>
		<breadcrumb :links="breadcrumbLinks" :classes="'text-[17px]'" ></breadcrumb>

		<section class="pt-6">
		<div class="container">
			<div class="bg-white px-4 py-7">
				<h2 class="text-[25px] font-bold text-dark">Change Password</h2>
				<form
					action="POST"
					@submit.prevent="validateBeforeSubmit"
					class="mt-12"
					>
					<label
						for="current_password"
						class="block text-[14px] font-semibold text-dark">
							Old Password
					</label>
					<div
						class="relative mt-3 overflow-hidden rounded-full border-[0.5px] border-text-gray"
						:style="errors.has('current_password') ? 'border-color: red;' : ''"
						>
						<input
							type="password"
							name="current_password"
							placeholder="Enter your password"
							class="w-full border-0 bg-transparent px-7 py-5 text-[16px] font-normal leading-none text-dark outline-none placeholder:text-[16px] placeholder:font-normal placeholder:text-text-gray"
                        	v-model="user.current_password"
							v-validate="'required|min:6'"
							:data-vv-as="$t('Password')"
							>
					</div>

					<label
						for="new_password"
						class="mt-7 block text-[14px] font-semibold text-dark"
						>Confirm Password
					</label>
					<div
						class="relative mt-3 overflow-hidden rounded-full border-[0.5px] border-text-gray"
						:style="errors.has('new_password') ? 'border-color: red;' : ''"
						>
						<input
							type="password"
							name="new_password"
							placeholder="Enter your password"
							class="w-full border-0 bg-transparent px-7 py-5 text-[16px] font-normal leading-none text-dark outline-none placeholder:text-[16px] placeholder:font-normal placeholder:text-text-gray"
							v-model="user.new_password"
							v-validate="'required|min:6'"
							:data-vv-as="$t('New Password')"
							>
					</div>

					<label
						for="new_password_confirmation"
						class="mt-7 block text-[14px] font-semibold text-dark">
							Confirm Password Again
					</label>
					<div
						class="relative mt-3 overflow-hidden rounded-full border-[0.5px] border-text-gray"
						:style="errors.has('new_password_confirmation') ? 'border-color: red;' : ''"
						>
						<input
						type="password"
						name="new_password_confirmation"
						placeholder="Enter your password"
						class="w-full border-0 bg-transparent px-7 py-5 text-[16px] font-normal leading-none text-dark outline-none placeholder:text-[16px] placeholder:font-normal placeholder:text-text-gray"
						v-model="user.new_password_confirmation"
						v-validate="'required|confirmed:new_password'"
						:data-vv-as="$t('Confirm Password')"
						>
					</div>

					<button
						type="submit"
						class="mt-20 inline-block w-full rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-7 py-5 text-center text-[15px] font-medium text-white disabled:opacity-[0.4]">
						Submit
					</button>
				</form>
			</div>
		</div>
	</section>
	</div>
</template>

<script>
    import {mapState, mapActions} from 'vuex';
    import Breadcrumb 	from "../../common/breadcrumb";

    export default {
        name: 'change-password',

		components:{
			Breadcrumb,
		},

		data: function () {
			return {
                themeAssets: window.config.themeAssetsPath,
				breadcrumbLinks:[
                    {
						'name': 'Home',
						'redirect':'/'
					},
					{
						'name': 'My Profile',
						'redirect':'/customer/account/my-profile'
					},
					{
						'name': 'Change Password',
					},
				],

				user: {
					'current_password': '',
					'new_password': '',
					'new_password_confirmation': '',
                },
			}
        },

		computed: mapState({
            customer: state => state.customer,
        }),

        mounted () {
            this.getCustomer();
        },

		methods: {
			...mapActions([
                'getCustomer',
			]),

			validateBeforeSubmit () {
                this.loading = true;

                this.$validator.validateAll().then((result) => {
                    if (result) {
                        this.updatePassword()
                    }
                });
			},

			updatePassword() {
				console.log('user', this.user);

				this.$http.post('/api/pwa/customer/update-password', this.user)
					.then(response => {
						// this.reasons = response.data.data;
						console.log(response);

					})
					.catch(error => {
						console.error('Error fetching support reasons:', error);
					});
			}
		}
    }
</script>
