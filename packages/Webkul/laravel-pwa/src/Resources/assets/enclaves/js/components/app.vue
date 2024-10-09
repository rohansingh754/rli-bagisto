<template>
    <div id="app-inner">
        <!-- header -->
        <welcome-model></welcome-model>


        <header class="border-b-[1px] border-[#E9E9E9]">
            <div class="container px-[18px] py-6">
                <div class="flex items-center justify-between">
                    <div class="homeful-toggler cursor-pointer py-[10px] pr-4">
                        <span
                            class="block h-3 w-[19px] border-b-[3px] border-t-[3px] border-dark"
                            @click="opneCloseMenuSidebar()"
                            >
                        </span>
                    </div>
                    <router-link :to="'/'">
                        <span class="homeful-logo mr-auto">
                            <img :src="themeAssets + 'images/logo.png'" alt="homeful">
                        </span>
                    </router-link>
                    <div v-if="currentUser" class="flex items-center justify-end flex-nowrap">
                        <a href="#" class="relative mr-3 flex h-[42px] w-[42px] items-center justify-center rounded-full">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14 0C12.6734 0 11.6 1.06656 11.6 2.38462C11.6 2.48708 11.6234 2.58489 11.6375 2.68269C7.48906 3.73528 4.4 7.47987 4.4 11.9231V22.6538C4.4 23.3292 3.87969 23.8462 3.2 23.8462H2V26.2308H10.625C10.4891 26.608 10.4 27.0039 10.4 27.4231C10.4 29.3839 12.0266 31 14 31C15.9734 31 17.6 29.3839 17.6 27.4231C17.6 27.0039 17.5109 26.608 17.375 26.2308H26V23.8462H24.8C24.1203 23.8462 23.6 23.3292 23.6 22.6538V12.2584C23.6 7.77795 20.5859 3.78185 16.3625 2.68269C16.3766 2.58489 16.4 2.48708 16.4 2.38462C16.4 1.06656 15.3266 0 14 0ZM13.475 4.76923C13.6484 4.75526 13.8219 4.76923 14 4.76923C14.075 4.76923 14.15 4.76923 14.225 4.76923C18.1438 4.88567 21.2 8.29958 21.2 12.2584V22.6538C21.2 23.073 21.2891 23.4689 21.425 23.8462H6.575C6.71094 23.4689 6.8 23.073 6.8 22.6538V11.9231C6.8 8.13657 9.73438 5.03936 13.475 4.76923ZM14 26.2308C14.675 26.2308 15.2 26.7524 15.2 27.4231C15.2 28.0938 14.675 28.6154 14 28.6154C13.325 28.6154 12.8 28.0938 12.8 27.4231C12.8 26.7524 13.325 26.2308 14 26.2308Z" fill="black"/>
                                </svg>
                                <span class="absolute right-2 top-1 flex h-4 w-4 items-center justify-center rounded-full bg-primary text-[11px] font-medium text-white">2</span>
                        </a>
                        <span
                            class="flex h-[42px] w-[42px] items-center justify-center rounded-full bg-[#F5F5F5]"
                            @click="opneCloseMenuSidebar()"
                            >
                            <svg width="17" height="21" viewBox="0 0 17 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.5 0C5.57536 0 3.1875 2.35977 3.1875 5.25C3.1875 8.14023 5.57536 10.5 8.5 10.5C11.4246 10.5 13.8125 8.14023 13.8125 5.25C13.8125 2.35977 11.4246 0 8.5 0ZM2.39062 12.6C1.0791 12.6 0 13.6664 0 14.9625V15.5928C0 17.1363 0.99056 18.5213 2.5013 19.4729C4.01204 20.4258 6.08032 21 8.5 21C10.9197 21 12.988 20.4258 14.4987 19.4729C16.0094 18.5213 17 17.1363 17 15.5928V14.9625C17 13.6664 15.9209 12.6 14.6094 12.6H2.39062Z" fill="#C4C4C4"/>
                            </svg>
                        </span>
                    </div>
                    <a v-else href="#" class="homeful-share text-[24px] text-dark">
                        <span class="icon-search"></span>
                    </a>
                </div>
                <drawer-sidebar ref="drawer">
                    <div class="homeful-mobile-menu scrollbar-hide fixed bottom-0 left-[-100%] top-0 w-[90%] max-w-[360px] overflow-auto bg-white pl-8 pr-6 pt-[62px] shadow-[0px_4px_4px] shadow-black/10 transition-all active">
                        <div class="flex items-start justify-between">
                            <a href="#" class="homeful-logo mr-auto">
                                <img :src="themeAssets + 'images/logo.png'" alt="homeful">
                            </a>
                            <span class="homeful-menu-close flex h-[35px] w-[35px] cursor-pointer items-center justify-center rounded-full bg-[#F3F4F6]" @click="opneCloseMenuSidebar()">
                                <span class="icon-cancel text-[14px] text-[#989898]"></span>
                            </span>
                        </div>
                        <router-link :to="'/customer/login-register'" class="login-info" v-if="! currentUser">

                            <a href="#" class="mt-10 flex items-center gap-[10px] rounded-[11px] border-[1px] border-[#F5F5F5] px-[13px] py-3 text-[14px] font-medium text-dark">
                                <span class="flex h-[45px] w-[45px] items-center justify-center rounded-full bg-[#F5F5F5]">
                                    <svg width="17" height="21" viewBox="0 0 17 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.5 0C5.57536 0 3.1875 2.35977 3.1875 5.25C3.1875 8.14023 5.57536 10.5 8.5 10.5C11.4246 10.5 13.8125 8.14023 13.8125 5.25C13.8125 2.35977 11.4246 0 8.5 0ZM2.39062 12.6C1.0791 12.6 0 13.6664 0 14.9625V15.5928C0 17.1363 0.99056 18.5213 2.5013 19.4729C4.01204 20.4258 6.08032 21 8.5 21C10.9197 21 12.988 20.4258 14.4987 19.4729C16.0094 18.5213 17 17.1363 17 15.5928V14.9625C17 13.6664 15.9209 12.6 14.6094 12.6H2.39062Z" fill="#C4C4C4"/>
                                        </svg>
                                </span> Login My Account
                            </a>
                        </router-link>
                        <div
                            v-if="currentUser"
                            class="mt-10 flex items-center gap-[10px] rounded-[20px] bg-[#F3F4F6] px-8 py-5 text-[14px] font-medium text-dark max-385:flex-col max-385:items-start max-385:px-4">
                            <img
                                :src="themeAssets + 'images/user.png'"
                                alt=""
                                class="h-11 w-11 rounded-full"
                                >
                            <div class="">
                                <p class="text-[24px] font-normal leading-none text-dark">{{currentUser.name}}</p>
                                <p class="mt-2 text-[14px] font-normal text-text-gray">{{currentUser.email}}</p>
                                <a href="#" class="mt-2 text-[15px] font-normal text-primary">View Profile</a>
                            </div>
                        </div>
                        <div class="mt-8 grid gap-[29px]">
                            <div class="border-b-[1px] border-[#E2E2E2] pb-5">
                                <router-link :to="'/'" class="text-[17px] font-medium text-dark decoration-black">
                                    <span v-if="! currentUser"> Home </span>
                                    <span v-if="currentUser"> Homepage </span>
                                </router-link>
                            </div>
                            <div
                                v-if="! currentUser"
                                class="border-b-[1px] border-[#E2E2E2] pb-5"
                                >
                                <router-link
                                    :to="'/pages/about-us'"
                                    class="text-[17px] font-medium text-dark"
                                    >
                                    About Us
                                </router-link>
                            </div>
                            <div
                                v-if="! currentUser"
                                class="border-b-[1px] border-[#E2E2E2] pb-5"
                                >
                                <span
                                    @click="openAsktoJoyDreawer()"
                                    class="text-[17px] font-medium text-dark"
                                    >
                                    Ask Joy
                                </span>
                            </div>
                            <div
                                v-if="! currentUser"
                                class="homeful-submenu border-b-[1px] border-[#E2E2E2] pb-5"
                                >
                                <button class="text-[17px] font-medium text-dark">
                                    <!-- <router-link :to="'/categories'"> -->
                                        Our Brands
                                    <!-- </router-link> -->
                                    <span
                                        class="icon-arrow-down float-right mt-[-4px] flex h-[29px] w-[29px] items-center justify-center rounded-full border-[1px] border-[#EDEFF5] text-[24px] text-primary"
                                        @click="categoryAccordianToggle()"
                                        >
                                    </span>
                                </button>
                                <div
                                    v-if="categoryAccordian"
                                    class="homeful-submenu-wrap mt-5 gap-[29px] border-t-[1px] border-[#E2E2E2] pl-5 pt-[29px]"
                                    >
                                    <div v-for="(category, index) in categories" :key="index" class="border-b-[1px] border-[#E2E2E2] pb-5">
                                        <router-link :to="'/categories/' + category.id">
                                            <a href="#" class="text-[17px] font-medium text-dark">{{category.name}}</a>
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                            <div
                                v-if="! currentUser"
                                class="border-b-[1px] border-[#E2E2E2] pb-5">
                                <router-link
                                    :to="'/pages/join-us'"
                                    class="text-[17px] font-medium text-dark"
                                    >
                                    Partner with us
                                </router-link>
                            </div>
                            <div
                                v-if="! currentUser"
                                class="border-b-[1px] border-[#E2E2E2] pb-5"
                                >
                                <router-link
                                    :to="'/newses'"
                                    class="text-[17px] font-medium text-dark"
                                    >
                                    Celebrations
                                </router-link>
                            </div>
                            <div
                                v-if="! currentUser"
                                class="border-b-[1px] border-[#E2E2E2] pb-5"
                                >
                                <router-link
                                    :to="'/pages/contact-us'"
                                    class="text-[17px] font-medium text-dark"
                                    >
                                    Talk to Us
                                </router-link>
                            </div>
                            <div
                                v-if="currentUser"
                                class="border-b-[1px] border-[#E2E2E2] pb-5"
                                >
                                <router-link
                                    :to="'/customer/account/change-password'"
                                    class="text-[17px] font-medium text-dark"
                                    >
                                    My Profile
                                </router-link>
                            </div>
                            <div
                                v-if="currentUser"
                                class="border-b-[1px] border-[#E2E2E2] pb-5"
                                >
                                <router-link
                                    :to="'/customer/account/my-properties'"
                                    class="text-[17px] font-medium text-dark"
                                    >
                                    My Property
                                </router-link>
                            </div>
                            <div
                                class="border-b-[1px] border-[#E2E2E2] pb-5"
                                >
                                <router-link
                                    v-if="currentUser"
                                    :to="'/customer/account/support'"
                                    class="text-[17px] font-medium text-dark"
                                    >
                                    Support
                                </router-link>
                            </div>
                            <div
                                v-if="currentUser"
                                class="border-b-[1px] border-[#E2E2E2] pb-5"
                                >
                                <button
                                    @click="logout"
                                    class="text-[17px] font-medium text-dark"
                                    >
                                    Logout
                                </button>
                            </div>
                        </div>
                    </div>
                </drawer-sidebar>
            </div>
        </header>
        <!-- header end-->
        <div slot="content">
            <div class="page-view-container">
                <router-view></router-view>
            </div>
        </div>

        <ajax-loader></ajax-loader>
    </div>
</template>

<script>

    import {mapState, mapActions} from 'vuex';
    import BottomSheet   from './shared/bottom-sheet';
    import HeaderNav     from './layouts/header-nav';
    import AjaxLoader    from './common/ajax-loader';
    import DrawerSidebar from './common/drawer-sidebar';
    import WelcomeModel  from './layouts/welcome-model';

    export default {
        name: 'app',

        components: {
            HeaderNav,
            BottomSheet,
            AjaxLoader,
            DrawerSidebar,
            WelcomeModel,
        },

        data () {
			return {
                categories: [],
                categoryAccordian: 0,
                subCategories: {},
                locales: window.config.locales,
                currencies: window.config.currencies,
                currentLocale: window.config.currentLocale,
                parent_id: window.channel.root_category_id,
                currentCurrency: window.config.currentCurrency,

                bottomSheets: {
                    locale: false,
                    currency: false,
                    subCategory: false,
                },

                currentUser: false,

                themeAssets: window.config.themeAssetsPath,
			}
		},

        computed: mapState({
            customer: state => state.customer,
        }),

        mounted () {
            this.getCustomer();

            this.currentUser = JSON.parse(localStorage.getItem('currentUser'));

            var this_this = this;

            EventBus.$on('user-logged-in', function(user) {

                this_this.currentUser = user.data;
            });

            EventBus.$on('user-logged-out', function() {
                this_this.currentUser = null;
            });

            this.getCategories();
        },

        watch: {
            $route (to, from) {
                this.$refs.drawer.close();
            }
        },

        methods: {
            ...mapActions([
                'getCustomer',
            ]),

            handleToggleDrawer () {
				if (this.$refs.drawer.active) {
					this.$refs.drawer.close();
				} else {
					this.$refs.drawer.open();
				}
			},

            getCategories (parent_id = window.channel.root_category_id) {
                EventBus.$emit('show-ajax-loader');

                this.$http.get("/api/v1/descendant-categories", { params: { parent_id } })
                    .then(response => {

                        EventBus.$emit('hide-ajax-loader');
                        if (parent_id == window.channel.root_category_id) {
                            this.categories = response.data.data;
                        } else {
                            this.subCategories[parent_id] = response.data.data;

                            this.handleToggleDrawer();
                            this.bottomSheets.subCategory = true;
                        }

                    })
                    .catch(error => {});
            },

            switchCurrency (currency) {
                this.bottomSheets.currency = false;

                EventBus.$emit('show-ajax-loader');

                this.$http.get("/api/switch-currency", { params: { currency: currency.code } })
                    .then(function(response) {
                        EventBus.$emit('hide-ajax-loader');

                        window.location.reload()
                    })
                    .catch(function (error) {});
            },

            switchLocale (locale) {
                this.bottomSheets.locale = false;

                var this_this = this;

                EventBus.$emit('show-ajax-loader');

                this.$http.get("/api/switch-locale", { params: { locale: locale.code } })
                    .then(function(response) {
                        EventBus.$emit('hide-ajax-loader');

                        this_this.$i18n.locale = locale.code;

                        window.location.reload()
                    })
                    .catch(function (error) {});
            },

            logout () {
                this.handleToggleDrawer();

                EventBus.$emit('show-ajax-loader');

                this.$http.post("/api/v1/customer/logout")
                    .then(function(response) {
                        EventBus.$emit('hide-ajax-loader');

                        localStorage.removeItem('currentUser');
                        localStorage.removeItem('token');

                        EventBus.$emit('user-logged-out');

                        this.$router.push({name: 'home'})
                    });
            },

            openSubcategories(parent_id, event) {
                this.parent_id = parent_id;

                if (! this.subCategories[parent_id]) {
                    this.getCategories(parent_id);
                } else {
                    // this.handleToggleDrawer();
                    this.bottomSheets.subCategory = true;
                }
            },

            redirectToCategory(categoryId) {
                this.$router.push({ name: 'category', params: { id: categoryId } })
                this.bottomSheets.subCategory = false;

            },

            opneCloseMenuSidebar(){
                if (this.$refs.drawer.active) {
					this.$refs.drawer.close();
				} else {
					this.$refs.drawer.open();
				}
            },

            openAsktoJoyDreawer() {
                if (this.$refs.drawer.active) {
					this.$refs.drawer.close();
                }

                EventBus.$emit('open-ask-to-joy-drawer');
            },

            categoryAccordianToggle(){
                if (this.categoryAccordian) {
                    this.categoryAccordian = 0;
                } else{
                    this.categoryAccordian = 1;
                }
            }
        }
    }
</script>

<style lang="scss">
    @import '~@/_variables.scss';

    .drawer {
        background: #F5F5F5;
        width: 100%;
        position: absolute;
        top: 0;
        bottom: 0;
        overflow-y: auto;

        .drawer-header {
            height: 132px;
            position: relative;

            .login-info {
                position: absolute;
                bottom: 0;
                padding: 15px;
                width: 100%;
                        color: #ffffff;

                .avatar {
                    width: 48px;
                    height: 48px;
                    float: left;
                    border-radius: 50%;
                    margin-right: 15px;
                }

                h2 {
                    color: #ffffff;
                    margin-top: 7px;
                }

                p {
                    color: #ffffff;
                    font-weight: 600;
                    font-size: 16px;
                }

                .arrow-right-icon {
                    position: absolute;
                    right: 0;
                    bottom: 15px;
                }
            }
        }

        .drawer-content {
            .drawer-box {
                padding: 15px 0px 0px 15px;
                background: #ffffff;
                margin-bottom: 15px;

                &:last-child {
                    margin-bottom: 0;
                }

                h2 {
                    font-size: 12px;
                    color: $font-light-black-color;
                    text-transform: uppercase;
                    margin-bottom: 5px;
                }

                ul {
                    li {
                        border-bottom: 1px solid rgba(0,0,0,0.08);
                        font-size: 14px;
                        font-weight: 600;

                        a {
                            color: rgba(0,0,0,0.86);
                            padding: 15px 15px 15px 0px;
                            display: block;
                        }

                        &:last-child {
                            border-bottom: 0;
                        }

                        .sharp-arrow-right-icon {
                            float: right;
                            opacity: 0.16;
                        }
                    }
                }

                &.preference {
                    ul {
                        li {
                            padding: 15px 15px 15px 0px;
                        }
                    }
                }

                &.logout {
                    padding: 15px;

                    button.logout-btn {
                        text-transform: uppercase;
                        border: 3px solid #000000;
                        font-size: 14px;
                        font-weight: 600;
                        color: #000000;
                        width: 100%;
                        background: #ffffff;
                        padding: 15px;
                    }
                }

                .category-list-item {
                    a {
                        overflow: hidden;
                        white-space: nowrap;
                        display: inline-block;
                        text-overflow: ellipsis;
                        width: calc(100% - 30px);
                    }

                    i {
                        top: 10px;
                        right: 10px;
                        position: relative;
                    }
                }
            }
        }
    }

    .page-view-container {
        position: relative;
    }
</style>
