<template>
	<div>
	<breadcrumb :links="breadcrumbLinks" ></breadcrumb>

	<section class="pt-6">
		<div class="container">
			<h1 class="text-[20px] font-bold text-dark">Submit a Ticket</h1>
			<div class="mt-11">
				<form action="post" @submit.prevent="validateBeforeSubmit">
					<div
						class="relative mt-3 overflow-hidden rounded-full border-[0.5px] border-text-gray"
						:class="[errors.has('reference_code') ? 'error' : '']"
						>
						<input
							type="text"
							name="reference_code"
							placeholder="Reference Code"
							v-validate="'required'"
							:data-vv-as="$t('Reference code')"
							class="w-full border-0 bg-transparent px-7 py-5 text-[16px] font-normal leading-none text-dark outline-none placeholder:text-[16px] placeholder:font-normal placeholder:text-text-gray"

							v-model="params.reference_code"
							>
					</div>
					<div
						class="relative mt-3 overflow-hidden rounded-full border-[0.5px] border-text-gray"
						:class="[errors.has('reason') ? 'error' : '']"
						>
						<div
							@click="openReasonsDrawer()"
							class="custom-select-trigger cursor-pointer px-7 py-5 text-[16px] font-normal text-text-gray" id="custom-select-trigger">
							<span id="selected-option">{{selectedReason}}</span>
							<div class="pointer-events-none absolute inset-y-0 right-5 flex items-center px-2 text-primary">
								<svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M6.00737 7.48852L0.70486 2.15778C0.0762042 1.52578 0.526452 0.449539 1.41787 0.452863L11.7034 0.491212C12.5783 0.494475 13.0275 1.54038 12.4274 2.17708L7.44178 7.46686C7.05431 7.87796 6.40577 7.88904 6.00737 7.48852Z" fill="#CC035C"/>
								</svg>
							</div>
						</div>
						<input
							type="hidden"
							name="reason"
							v-validate="'required'"
							:data-vv-as="$t('Reason')"
							v-model="params.reason"
							>
					</div>
					<div
						class="relative mt-3 overflow-hidden rounded-[25px] border-[0.5px] border-text-gray"
						:class="[errors.has('comment') ? 'error' : '']"
						>
						<textarea
							type="text"
							name="comment"
							rows="4"
							v-validate="'required'"
							:data-vv-as="$t('comment')"
							v-model="params.comment"
							placeholder="Comment"
							class="w-full resize-none border-0 bg-transparent px-7 py-5 text-[16px] font-normal text-dark outline-none placeholder:text-[16px] placeholder:font-normal placeholder:text-text-gray">
						</textarea>
					</div>
					<div class="custom-upload-button relative mt-3 overflow-hidden rounded-[25px] border-[0.5px] border-text-gray">
						<input
							id="upload-file"
							type="file"
							@change="uploadFile()"
							ref="file"
							class="hide-upload-btn w-full cursor-pointer border-0 bg-transparent px-7 py-5 text-[16px] font-normal leading-none text-primary">
					</div>
					<div class="mt-3" v-if="imagePreviewURL">
						<img
							:src="imagePreviewURL"
							alt="Image-preview"
							style="max-width: 100%;width: 125px; object-fit: cover"
							/>
					</div>
					<button
						type="submit"
						class="mt-4 inline-block w-full rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-7 py-5 text-center text-[15px] font-medium text-white disabled:opacity-[0.4]"
						:disabled="!params.reason || !params.comment"
						>
						Submit
					</button>
				</form>
			</div>
		</div>
	</section>
	<div class="panel" style="margin-bottom: 0">
		<div class="panel-content">
			<footer-nav></footer-nav>
		</div>
	</div>

	<div>
		<drawer-up>
			<!-- select options modal -->
			<div
				ref="ReasonsDrawerRef"
				class="options-list min-h-[428px] rounded-t-[30px] bg-white px-6 py-7"
				>
				<div
					class="flex items-center justify-between border-b-[1px] border-[#8B8B8B4D] pb-2"
					>
					<h2 class="text-[20px] font-bold text-dark">Nature of Concern</h2>
					<span class="close-select-option flex h-[35px] w-[35px] cursor-pointer items-center justify-center rounded-full bg-[#F3F4F6]" @click="openReasonsDrawer()">
						<span class="icon-cancel text-[14px] text-[#989898]"></span>
					</span>
				</div>
				<ul id="options-list" class="mt-16">
					<li
						v-for="(reason, index) in reasons" :key="index"
						class="option mt-7 cursor-pointer border-b-[0.5px] border-text-gray pb-5 text-[16px] font-normal text-text-gray"
						:data-value="reason.name"
						@click="ticketReason(reason)"
						>
						{{reason.name}}
					</li>
				</ul>
			</div>
			<!-- select options modal end-->
		</drawer-up>
	</div>
	</div>
</template>

<script>
    import {mapState, mapActions} from 'vuex';
    import Breadcrumb 	from "../../common/breadcrumb";
	import FooterNav    from '../../layouts/footer-nav';
    import DrawerUp     from '../../common/drawer-up';

    export default {
        name: 'support',

		components:{
			Breadcrumb,
			FooterNav,
			DrawerUp,
		},

		data: function () {
			return {
                themeAssets: window.config.themeAssetsPath,
            	user: JSON.parse(localStorage.getItem('currentUser')),
				breadcrumbLinks:[
                    {
						'name': 'Home',
						'redirect':'/'
					},
					{
						'name': 'Support',
					},
                ],

				reasons:[],
				reasonsDrawer:0,
				params:{},
				selectedReason:'Nature of Concern',
				images:null,
				imagePreviewURL:null

			}
        },

		computed: mapState({
            customer: state => state.customer,
        }),

        mounted () {
            this.getCustomer();
			this.getSupportReasons();


        },

		methods: {
			...mapActions([
                'getCustomer',
            ]),

			validateBeforeSubmit () {

                this.$validator.validateAll().then((result) => {
                    if (result) {
                    	this.storeTicket()
                    }
                });
            },

			storeTicket(){
				const formData = new FormData();

				formData.append('file', this.images);
				formData.append('comment', this.params.comment);
				formData.append('reason', this.params.reason);
				formData.append('customer_id', this.user.id);

				this.$http.post("api/pwa/customer/support/ticket/store", formData)
					.then(response => {
						this.params = {}
						this.images = null
						this.$refs.file.files = [];
						this.imagePreviewURL = null;
					})
					.catch(error => {});
			},

			uploadFile() {
				this.images = this.$refs.file.files[0];

				this.imagePreviewURL = URL.createObjectURL(this.images);
			},

			getSupportReasons() {
				this.$http.get('/api/pwa/customer/support/reasons')
					.then(response => {
						this.reasons = response.data.data;
						console.log(this.reasons);

					})
					.catch(error => {
						console.error('Error fetching support reasons:', error);
					});
			},

			ticketReason(reason){
				this.params.reason = reason.name;
				this.selectedReason = reason.name;

				this.openReasonsDrawer();
			},

			openReasonsDrawer(){
				this.reasonsDrawer = 1;

                EventBus.$emit('drawer-up-heigth-update', this.$refs.ReasonsDrawerRef.offsetHeight);

                EventBus.$emit('drawer-up-toggle');
            },
		}
    }
</script>

<style lang="scss">
	.options-list{
		max-height:700px
	}
</style>
