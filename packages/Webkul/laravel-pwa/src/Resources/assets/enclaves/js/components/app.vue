<template>
    <div id="app-inner">
        <!-- header -->
        <welcome-model></welcome-model>

        <header class="border-b-[1px] border-[#E9E9E9]">
            <div class="container px-[18px] py-6">
                <div class="flex items-center justify-between">
                    <div class="homeful-toggler cursor-pointer py-[10px] pr-4">
                        <span class="block h-3 w-[19px] border-b-[3px] border-t-[3px] border-dark" @click="OpneCloseMenuSidebar()"></span>
                    </div>
                    <router-link :to="'/'">
                        <a href="#" class="homeful-logo mr-auto">
                            <img :src="themeAssets + 'images/logo.png'" alt="homeful">
                        </a>
                    </router-link>
                    <a href="#" class="homeful-share text-[24px] text-dark">
                        <span class="icon-search"></span>
                    </a>
                </div>
                <drawer-sidebar ref="drawer">
                    <div class="homeful-mobile-menu scrollbar-hide fixed bottom-0 left-[-100%] top-0 w-[90%] max-w-[360px] overflow-auto bg-white pl-8 pr-6 pt-[62px] shadow-[0px_4px_4px] shadow-black/10 transition-all active">
                        <div class="flex items-start justify-between">
                            <a href="#" class="homeful-logo mr-auto">
                                <img :src="themeAssets + 'images/logo.png'" alt="homeful">
                            </a>
                            <span class="homeful-menu-close flex h-[35px] w-[35px] cursor-pointer items-center justify-center rounded-full bg-[#F3F4F6]" @click="OpneCloseMenuSidebar()">
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
                        <div class="mt-8 grid gap-[29px]">
                            <div class="border-b-[1px] border-[#E2E2E2] pb-5">
                                <router-link :to="'/'">
                                    <a href="#" class="text-[17px] font-medium text-dark decoration-black">Home</a>
                                </router-link>
                            </div>
                            <div class="border-b-[1px] border-[#E2E2E2] pb-5">
                                <router-link :to="'/pages/about-us'">
                                    <a href="./about-us.html" class="text-[17px] font-medium text-dark">About Us</a>
                                </router-link>
                            </div>
                            <div class="border-b-[1px] border-[#E2E2E2] pb-5">
                                <a href="#" class="text-[17px] font-medium text-dark">Ask Joy</a>
                            </div>
                            <div class="homeful-submenu border-b-[1px] border-[#E2E2E2] pb-5">
                                <a href="#" class="text-[17px] font-medium text-dark">Our Brands<span class="icon-arrow-down float-right mt-[-4px] flex h-[29px] w-[29px] items-center justify-center rounded-full border-[1px] border-[#EDEFF5] text-[24px] text-primary"></span></a>
                                <div
                                    v-if="categories.length"
                                    class="homeful-submenu-wrap mt-5 gap-[29px] border-t-[1px] border-[#E2E2E2] pl-5 pt-[29px]"
                                    >
                                    <div v-for="(category, index) in categories" :key="index" class="border-b-[1px] border-[#E2E2E2] pb-5">
                                        <router-link :to="'/categories/' + category.id">
                                            <a href="#" class="text-[17px] font-medium text-dark">{{category.name}}</a>
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                            <div class="border-b-[1px] border-[#E2E2E2] pb-5">
                                <a href="#" class="text-[17px] font-medium text-dark">Partner with us</a>
                            </div>
                            <div class="border-b-[1px] border-[#E2E2E2] pb-5">
                                <a href="#" class="text-[17px] font-medium text-dark">Celebrations</a>
                            </div>
                            <div class="border-b-[1px] border-[#E2E2E2] pb-5">
                                <a href="#" class="text-[17px] font-medium text-dark">Talk to Us</a>
                            </div>
                            <div class="border-b-[1px] border-[#E2E2E2] pb-5">
                                <a href="#" class="text-[17px] font-medium text-dark">Support</a>
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
    import BottomSheet   from './shared/bottom-sheet';
    import HeaderNav     from './layouts/header-nav';
    import AjaxLoader    from './common/ajax-loader';
    import DrawerSidebar from './common/drawer-sidebar';
    import WelcomeModel  from './layouts/welcome-model';

    export default {
        name: 'app',

        components: { HeaderNav, BottomSheet, AjaxLoader, DrawerSidebar, WelcomeModel },

        data () {
			return {
                categories: [],
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

        mounted () {
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
                    });
            },

            openSubcategories(parent_id, event) {
                this.parent_id = parent_id;

                if (! this.subCategories[parent_id]) {
                    this.getCategories(parent_id);
                } else {
                    this.handleToggleDrawer();
                    this.bottomSheets.subCategory = true;
                }
            },

            redirectToCategory(categoryId) {
                this.$router.push({ name: 'category', params: { id: categoryId } })
                this.bottomSheets.subCategory = false;

            },

            OpneCloseMenuSidebar(){
                if (this.$refs.drawer.active) {
					this.$refs.drawer.close();
				} else {
					this.$refs.drawer.open();
				}
            },
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
