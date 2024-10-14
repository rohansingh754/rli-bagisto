<template>
    <div>
	<!-- breadcrumb -->
	<breadcrumb :links="breadcrumbLinks" :classes="'text-[17px]'" ></breadcrumb>
	<!-- breadcrumb end -->
	 <section class="pt-6">
		<div class="scrollbar-hide overflow-x-auto">
			<div class="ml-[15px] flex w-max items-center gap-3">
				<div
					class="group flex cursor-pointer items-center gap-1.5"
					:class="documentPhase == 1 ? 'active' : ''"
					@click="updateDocumentPhase(1)"
					>
					<span class="flex h-6 w-6 items-center justify-center rounded-full bg-[#BEC5D2] text-[16px] font-bold text-white group-[.active]:bg-[#C38400]">1</span>
					<p class="text-[14px] font-bold text-[#8B8B8B] group-[.active]:text-dark">Upload</p>
				</div>
				<span class="icon-arrow-left rotate-180 text-[14px] font-bold text-[#BEC5D2]"></span>
				<div
					class="group flex cursor-pointer items-center gap-1.5"
					:class="documentPhase == 2 ? 'active' : ''"
					@click="updateDocumentPhase(2)"
					>
					<span class="flex h-6 w-6 items-center justify-center rounded-full bg-[#BEC5D2] text-[16px] font-bold text-white group-[.active]:bg-[#C38400]">2</span>
					<p class="text-[14px] font-bold text-[#8B8B8B] group-[.active]:text-dark">For Approval</p>
				</div>
				<span class="icon-arrow-left rotate-180 text-[14px] font-bold text-[#BEC5D2]"></span>
				<div
					class="group flex cursor-pointer items-center gap-1.5"
					:class="documentPhase == 3 ? 'active' : ''"
					@click="updateDocumentPhase(3)"
					>
					<span class="flex h-6 w-6 items-center justify-center rounded-full bg-[#BEC5D2] text-[16px] font-bold text-white group-[.active]:bg-[#C38400]">3</span>
					<p class="text-[14px] font-bold text-[#8B8B8B] group-[.active]:text-dark">Re-upload</p>
				</div>
				<span class="icon-arrow-left rotate-180 text-[14px] font-bold text-[#BEC5D2]"></span>
				<div
					class="group flex cursor-pointer items-center gap-1.5"
					:class="documentPhase == 4 ? 'active' : ''"
					@click="updateDocumentPhase(4)"
					>
					<span class="flex h-6 w-6 items-center justify-center rounded-full bg-[#BEC5D2] text-[16px] font-bold text-white group-[.active]:bg-[#C38400]">4</span>
					<p class="text-[14px] font-bold text-[#8B8B8B] group-[.active]:text-dark">For Signing</p>
				</div>
				<span class="icon-arrow-left rotate-180 text-[14px] font-bold text-[#BEC5D2]"></span>
				<div
					class="group flex cursor-pointer items-center gap-1.5"
					:class="documentPhase == 5 ? 'active' : ''"
					@click="updateDocumentPhase(5)"
					>
					<span class="flex h-6 w-6 items-center justify-center rounded-full bg-[#BEC5D2] text-[16px] font-bold text-white group-[.active]:bg-[#C38400]">5</span>
					<p class="text-[14px] font-bold text-[#8B8B8B] group-[.active]:text-dark">Signed</p>
				</div>
			</div>
		</div>
		<document-phase-1 v-if="documentPhase == 1"></document-phase-1>
		<document-phase-2 v-if="documentPhase == 2"></document-phase-2>
		<document-phase-3 v-if="documentPhase == 3"></document-phase-3>
		<document-phase-4 v-if="documentPhase == 4"></document-phase-4>
		<document-phase-5 v-if="documentPhase == 5"></document-phase-5>
	 </section>

    </div>
</template>

<script>

	import { mapState, mapActions } from 'vuex';
    import DocumentPhase1         from './phase-1';
    import DocumentPhase2         from './phase-2';
    import DocumentPhase3         from './phase-3';
    import DocumentPhase4         from './phase-4';
    import DocumentPhase5         from './phase-5';
    import DrawerUp               from '../../../common/drawer-up';
    import Breadcrumb 	          from "../../../common/breadcrumb";
    import SignAllDrawer          from "./sign-all-drawer";

    export default {
        name: 'documents',

		components: {
			DocumentPhase1,
			DocumentPhase2,
			DocumentPhase3,
			DocumentPhase4,
			DocumentPhase5,
            DrawerUp,
			Breadcrumb,
			SignAllDrawer,
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
						'name': 'My Documents',
					},
				],

				documentPhase: 1,
				signAllDrawer:0,
			}
        },

        computed: mapState({
            customer: state => state.customer,
        }),

	mounted() {
			let this_this = this;

            this.getCustomer();
        },

        methods: {
            ...mapActions([
                'getCustomer',
            ]),

			updateDocumentPhase(phase) {
				this.documentPhase = phase;
			},
        }
    }
</script>
