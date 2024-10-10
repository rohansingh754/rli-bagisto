<script>
import Vue                  from 'vue';
import Router               from 'vue-router';
import App                  from './components/app';
import Homepage             from './components/home-page/index';
import Search               from './components/search/index';
import Compare              from './components/compare/index';
import SearchResult         from './components/search/result';
import ImageSearchResult    from './components/search/image-search-result';
import Categories             from './components/categories/list';
import Category             from './components/categories/index';
import Products              from './components/products/list';
import Product              from './components/products/index';
import page                 from './components/pages/index';
// import ProductReviewList    from './components/reviews/index';
// import ProductReviewCreate  from './components/reviews/create';
import Customer             from './components/customers/index';
import LoginRegister        from './components/customers/anonymous/login-register';
// import Cart                 from './components/checkout/cart/index';
// import Onepage              from './components/checkout/onepage/index';
// import OrderSuccess         from './components/checkout/onepage/success';
import Account              from './components/customers/account/index';
// import Dashboard            from './components/customers/account/dashboard/index';
// import EditProfile          from './components/customers/account/profile/index';
// import Wishlist             from './components/customers/account/wishlist/index';
// import OrderList            from './components/customers/account/sales/orders/index';
// import OrderDetail          from './components/customers/account/sales/orders/view';
// import InvoiceList          from './components/customers/account/sales/invoices/index';
// import InvoiceDetail        from './components/customers/account/sales/invoices/view';
// import ShipmentList         from './components/customers/account/sales/shipments/index';
// import ShipmentDetail       from './components/customers/account/sales/shipments/view';
// import AddressList          from './components/customers/account/addresses/index';
// import CreateAddress        from './components/customers/account/addresses/create';
// import EditAddress          from './components/customers/account/addresses/edit';
// import CustomerReviewList   from './components/customers/account/reviews/index';
// import CustomerReviewDetail from './components/customers/account/reviews/view';
import Offline                 from './components/offline/index';

import Newses                      from './components/news/list';
import NewsDetail                  from './components/news/view';
import AskToJoyResult              from './components/ask-to-joy/ask-joy-result';
import AskToJoyResultCompare       from './components/ask-to-joy/ask-joy-result-compare';

import Support            from './components/customers/account/support';
import MyProperties       from './components/customers/account/my-properties';
import MyProfile          from './components/customers/account/my-profile';
import ChangePassword     from './components/customers/account/change-password';
import Documents          from './components/customers/account/documents/index';

Vue.use(Router);

export default new Router({
    mode: 'history',
    base: `${window.config.prefix}`,
    routes: [
        {
            path: '/',
            name: 'home',
            component: Homepage
        }, {
            path: '/search',
            name: 'search',
            component: Search
        }, {
            path: '/compare',
            name: 'compare',
            component: Compare
        }, {
            path: '/search/:term',
            name: 'search-result',
            component: SearchResult
        }, {
            path: '/image-search/:term',
            name: 'image-search-result',
            component: ImageSearchResult
        }, {
            path: '/categories',
            name: 'categories',
            component: Categories
        }, {
            path: '/categories/:id',
            name: 'category',
            component: Category
        }, {
            path: '/products',
            name: 'products',
            component: Products
        }, {
            path: '/products/:id',
            name: 'product',
            component: Product
        }, {
            path: '/pages/:slug',
            name: 'pages',
            component: page
        },
        // {
        //     path: '/reviews/:id',
        //     name: 'product-review-list',
        //     component: ProductReviewList
        // }, {
        //     path: '/reviews/:id/create',
        //     name: 'product-review-create',
        //     component: ProductReviewCreate
        // },
        // {
        //     path: '/checkout/cart',
        //     name: 'cart',
        //     component: Cart
        // }, {
        //     path: '/checkout/onepage',
        //     name: 'onepage',
        //     component: Onepage
        // }, {
        //     path: '/checkout/success',
        //     name: 'order-success',
        //     component: OrderSuccess
        // },
        {
            path: '/customer',
            name: 'customer',
            component: Customer,
            children: [
                {
                    path: 'login-register',
                    name: 'login-register',
                    component: LoginRegister
                },{
                    path: 'account',
                    name: 'account',
                    component: Account,
                    children: [
                        // {
                        //     path: 'dashboard',
                        //     name: 'dashboard',
                        //     component: Dashboard
                        // },
                        // {
                        //     path: 'profile',
                        //     name: 'profile',
                        //     component: EditProfile
                        // },
                        // {
                        //     path: 'wishlist',
                        //     name: 'wishlist',
                        //     component: Wishlist
                        // }, {
                        //     path: 'orders',
                        //     name: 'order-list',
                        //     component: OrderList
                        // }, {
                        //     path: 'orders/:id',
                        //     name: 'order-detail',
                        //     component: OrderDetail
                        // }, {
                        //     path: ':order_id/invoices',
                        //     name: 'invoice-list',
                        //     component: InvoiceList
                        // }, {
                        //     path: ':order_id/invoices/:id',
                        //     name: 'invoice-detail',
                        //     component: InvoiceDetail
                        // }, {
                        //     path: ':order_id/shipments',
                        //     name: 'shipment-list',
                        //     component: ShipmentList
                        // }, {
                        //     path: ':order_id/shipments/:id',
                        //     name: 'shipment-detail',
                        //     component: ShipmentDetail
                        // }, {
                        //     path: 'addresses',
                        //     name: 'address-list',
                        //     component: AddressList
                        // }, {
                        //     path: 'addresses/create',
                        //     name: 'create-address',
                        //     component: CreateAddress
                        // },
                        // {
                        //     path: 'addresses/:id',
                        //     name: 'edit-address',
                        //     component: EditAddress
                        // }, {
                        //     path: 'reviews',
                        //     name: 'customer-review-list',
                        //     component: CustomerReviewList
                        // }, {
                        //     path: 'reviews/:id',
                        //     name: 'customer-review-detail',
                        //     component: CustomerReviewDetail
                        // },
                        {
                            path:'support',
                            name:'support',
                            component: Support,
                        }, {
                            path:'my-properties',
                            name:'my-properties',
                            component: MyProperties,
                        }, {
                            path:'my-profile',
                            name:'my-profile',
                            component: MyProfile,
                        }, {
                            path:'change-password',
                            name:'change-password',
                            component: ChangePassword,
                        }, {
                            path:'documents',
                            name:'documents',
                            component: Documents,
                        },
                    ]
                }
            ]
        }, {
            path: '/offline',
            name: 'offline',
            component: Offline
        },{
            path:'/newses',
            name:'newses',
            component: Newses,
        }, {
            path:"/newses/:id",
            name:'news',
            component: NewsDetail
        }, {
            path:'/ask-joy-result',
            name:'ask-joy-result',
            component: AskToJoyResult,
        },  {
            path:'/ask-joy-result/compare',
            name:'ask-joy-result-compare',
            component: AskToJoyResultCompare,
        },
    ],
});
</script>
