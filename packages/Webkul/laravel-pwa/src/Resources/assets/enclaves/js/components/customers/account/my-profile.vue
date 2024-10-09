<template>
    <div>
    <!-- breadcrumb -->
	<breadcrumb :links="breadcrumbLinks" :classes="'text-[17px]'" ></breadcrumb>
	<!-- breadcrumb end -->
	 <section class="pt-6 pb-6">
		<div class="container">
			<h1 class="text-[20px] font-bold text-dark">Account Details</h1>
			<div class="mt-4 rounded-[10px] bg-white px-5 py-7">
				<div class="grid grid-cols-2 gap-x-14 gap-y-3 max-385:gap-x-4">
					<p class="text-[14px] font-medium text-dark">Full Name: </p>
					<p class="text-[14px] font-normal text-dark">{{customer.name}}</p>

					<p class="text-[14px] font-medium text-dark">Phone Number</p>
					<p class="text-[14px] font-normal text-dark">{{customer.phone}}</p>

					<p class="text-[14px] font-medium text-dark">Email</p>
					<p class="text-[14px] font-normal text-dark">{{customer.email}}</p>

					<p class="text-[14px] font-medium text-dark">Password</p>
                    <router-link
                        :to="'/customer/account/change-password'"
                        class="text-[14px] font-bold text-primary underline"
                        >
                        change password
                    </router-link>
				</div>
			</div>
			<h2 class="mt-9 text-[20px] font-bold text-dark">Customer Info Sheet Details</h2>
			<div
                class="accordian-card group mt-4 rounded-[10px] bg-white px-5 py-7"
                :class="information.personal_details ? 'active' : '' "
                >
				<div
                    class="accordian-toggle flex cursor-pointer items-center justify-between gap-2"
                    @click="toggleAccordian('personal_details')"
                    >
					<p class="text-[14px] font-semibold text-primary">Personal Details</p>
					<span class="icon-arrow-down text-[28px] text-primary group-[:not(.active)]:rotate-180"></span>
				</div>
				<div
                    class="mt-8 group-[:not(.active)]:hidden"
                    v-if="information.personal_details"
                    >
					<div class="grid grid-cols-2 gap-x-14 gap-y-3 max-385:gap-x-4">
						<p class="text-[14px] font-bold text-dark">Full Name: </p>
						<p class="text-[14px] font-normal text-dark">{{customerData.personal_details.full_name}}</p>

						<p class="text-[14px] font-bold text-dark">Email: </p>
						<p class="text-[14px] font-normal text-dark">{{customerData.personal_details.email}}</p>

						<p class="text-[14px] font-bold text-dark">Address: </p>
						<p class="text-[14px] font-normal text-dark">{{customerData.personal_details.address_1}}</p>

                        <p class="text-[14px] font-bold text-dark">Phone: </p>
						<p class="text-[14px] font-normal text-dark">{{customerData.personal_details.phone}}</p>

                        <p class="text-[14px] font-bold text-dark">Lot/Unit number: </p>
						<p class="text-[14px] font-normal text-dark">{{customerData.personal_details.lot_unit_number}}</p>

                        <p class="text-[14px] font-bold text-dark">Civil Status:</p>
						<p class="text-[14px] font-normal text-dark">{{customerData.personal_details.civil_status}}</p>

                        <p class="text-[14px] font-bold text-dark">Gender:</p>
						<p class="text-[14px] font-normal text-dark">{{customerData.personal_details.gender}}</p>

						<p class="text-[14px] font-bold text-dark">Date of Birth: </p>
						<p class="text-[14px] font-normal text-dark">{{formattedDate(customer.date_of_birth)}}</p>

						<p class="text-[14px] font-bold text-dark">Age:</p>
						<p class="text-[14px] font-normal text-dark">{{calculateAge(customer.date_of_birth)}}</p>
					</div>

					<p class="mt-11 text-[14px] font-semibold text-primary">Contact Information</p>
					<div
                        class="mt-8 grid grid-cols-2 gap-x-14 gap-y-3 max-385:gap-x-4"
                        >
						<p class="text-[14px] font-bold text-dark">Email Address: </p>
						<p class="text-[14px] font-normal text-dark">{{customerData.personal_details.email}}</p>
						<p class="text-[14px] font-bold text-dark">Mobile Number: </p>
						<p class="text-[14px] font-normal text-dark">{{customerData.personal_details.phone}}</p>
					</div>
					<p class="mt-11 text-[14px] font-semibold text-primary">Present Address</p>
					<div class="mt-8 grid grid-cols-2 gap-x-14 gap-y-3 max-385:gap-x-4">
						<p class="text-[14px] font-bold text-dark">Region: </p>
						<p class="text-[14px] font-normal text-dark">Region 1</p>
						<p class="text-[14px] font-bold text-dark">Province: </p>
						<p class="text-[14px] font-normal text-dark">La Union</p>
						<p class="text-[14px] font-bold text-dark">City/Town: </p>
						<p class="text-[14px] font-normal text-dark">Agoo</p>
						<p class="text-[14px] font-bold text-dark">Barangay: </p>
						<p class="text-[14px] font-normal text-dark">San Juan</p>
						<p class="text-[14px] font-bold text-dark">Zip Code:</p>
						<p class="text-[14px] font-normal text-dark">2504</p>
						<p class="text-[14px] font-bold text-dark">Home Ownership: </p>
						<p class="text-[14px] font-normal text-dark">Owned</p>
						<p class="text-[14px] font-bold text-dark">Years Stayed in the Current Address: </p>
						<p class="text-[14px] font-normal text-dark">20 years</p>
						<p class="text-[14px] font-bold text-dark">Permanent Address?:</p>
						<p class="text-[14px] font-normal text-dark">Yes</p>
					</div>
				</div>
			</div>
			<div
                class="accordian-card group mt-4 rounded-[10px] bg-white px-5 py-7"
                :class="information.employment_type ? 'active' : '' "
                >
				<div
                    class="accordian-toggle flex cursor-pointer items-center justify-between gap-2"
                    @click="toggleAccordian('employment_type')"
                    >
					<p class="text-[14px] font-semibold text-primary">Employment Information</p>
					<span class="icon-arrow-down text-[28px] text-primary group-[:not(.active)]:rotate-180"></span>
				</div>
				<div
                    class="mt-8 group-[:not(.active)]:hidden"
                    v-if="information.employment_type"
                    >
					<div class="grid grid-cols-2 gap-x-14 gap-y-3 max-385:gap-x-4">
						<p class="text-[14px] font-bold text-dark">Employment Type: </p>
						<p class="text-[14px] font-normal text-dark">{{customerData.employment_type.employment_type}}</p>

                        <p class="text-[14px] font-bold text-dark">Gross Income: </p>
						<p class="text-[14px] font-normal text-dark">{{customerData.employment_type.gross_income}}</p>

                        <p class="text-[14px] font-bold text-dark">Nationality:</p>
						<p class="text-[14px] font-normal text-dark">{{customerData.employment_type.nationality}}</p>

                        <p class="text-[14px] font-bold text-dark">Work Industry:</p>
						<p class="text-[14px] font-normal text-dark">{{customerData.employment_type.work_industry}}</p>

						<p class="text-[14px] font-bold text-dark">Employment Status: </p>
						<p class="text-[14px] font-normal text-dark">{{customerData.employment_type.employment_status}}</p>

						<p class="text-[14px] font-bold text-dark">Current Position:</p>
						<p class="text-[14px] font-normal text-dark">{{customerData.employment_type.current_position}}</p>

						<p class="text-[14px] font-bold text-dark">Employer Name:</p>
						<p class="text-[14px] font-normal text-dark">{{customerData.personal_details.employer_name}}</p>

						<p class="text-[14px] font-bold text-dark">Employer Number:</p>
						<p class="text-[14px] font-normal text-dark">{{customerData.employment_type.employer_contact_number}}</p>

						<p class="text-[14px] font-bold text-dark">Employer Address:</p>
						<p class="text-[14px] font-normal text-dark">{{customerData.employment_type.employer_address}}</p>

						<p class="text-[14px] font-bold text-dark">Tax Identification Number:</p>
						<p class="text-[14px] font-normal text-dark">{{customerData.employment_type.tax_identification_number}}</p>

						<p class="text-[14px] font-bold text-dark">PAG-IBIG Number:</p>
						<p class="text-[14px] font-normal text-dark">{{customerData.employment_type.PAG_IBIG_number}}</p>
					</div>
					<p class="mt-11 text-[14px] font-semibold text-primary">Employer Details</p>
					<div class="mt-8 grid grid-cols-2 gap-x-14 gap-y-3 max-385:gap-x-4">
						<p class="text-[14px] font-bold text-dark">Email Address: </p>
						<p class="text-[14px] font-normal text-dark">{{customerData.personal_details.email}}</p>
						<p class="text-[14px] font-bold text-dark">Mobile Number: </p>
						<p class="text-[14px] font-normal text-dark">{{customerData.personal_details.phone}}</p>
					</div>
				</div>
			</div>
			<div class="accordian-toggle flex cursor-pointer items-center justify-between gap-2">
				<h2 class="mt-4 text-[20px] font-bold text-dark">My Documents</h2>
				<a href="#" class="text-[14px] font-bold text-primary underline">View All</a>
			</div>
		</div>
	 </section>
    </div>
</template>

<script>

    import {mapState, mapActions} from 'vuex';
    import Breadcrumb 	from "../../common/breadcrumb";

    export default {
        name: 'my-profile',

        components: {
            Breadcrumb
        },

        data: function () {
			return {
                themeAssets: window.config.themeAssetsPath,
                customerData: {},
                information: {
                    'personal_details':0,
                    'employment_type':0
                },
                breadcrumbLinks:[
                    {
						'name': 'Home',
						'redirect':'/'
					},
					{
						'name': 'My Profile',
					},
                ],
			}
        },

        computed: mapState({
            customer: state => state.customer,
        }),

        mounted () {
            this.getCustomer();
            this.getCustomerAttributes();
        },

        methods: {
            ...mapActions([
                'getCustomer',
            ]),

            formattedDate(data) {
                const date = new Date(data);
                return date.toLocaleDateString('en-US', {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });
            },

            calculateAge(data) {
                const today = new Date();
                const birthDate = new Date(data);
                let age = today.getFullYear() - birthDate.getFullYear();
                const monthDifference = today.getMonth() - birthDate.getMonth();

                if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
                    age--;
                }

                return age;
            },

            getCustomerAttributes() {
                this.$http.get('/api/pwa/customer/attributes')
                    .then(response => {
                        let data = response.data.data;

                        for (const key in data.attributes) {
                            if (data.attributes.hasOwnProperty(key)) {
                                const element = data.attributes[key];
                                const attr = {};

                                element.forEach(ele => {
                                    attr[ele.name] = ele.value
                                });

                                this.customerData[key] = attr;
                            }
                        }
					})
					.catch(error => {
						console.error('Error fetching customer attributes:', error);
					});
            },

            toggleAccordian(key) {
                if (this.information[key]) {
                    this.information[key] = 0
                } else {
                    this.information[key] = 1
                }
            }
        }
    }
</script>
