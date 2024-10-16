<script>
import Vue                   from 'vue';
import Router                from 'vue-router';
import App                   from './components/app';
import Homepage              from './components/home-page/index';
import Search                from './components/search/index';
import SearchResult          from './components/search/result';
import ImageSearchResult     from './components/search/image-search-result';
import Categories            from './components/categories/list';
import Category              from './components/categories/index';
import Products              from './components/products/list';
import Product               from './components/products/index';
import page                  from './components/pages/index';
import Customer              from './components/customers/index';
import LoginRegister         from './components/customers/anonymous/login-register';
import Account               from './components/customers/account/index';
import Offline               from './components/offline/index';
import Newses                from './components/news/list';
import NewsDetail            from './components/news/view';
import AskToJoyResult        from './components/ask-to-joy/ask-joy-result';
import AskToJoyResultCompare from './components/ask-to-joy/ask-joy-result-compare';
import Support               from './components/customers/account/support';
import MyProperties          from './components/customers/account/my-properties';
import MyProfile             from './components/customers/account/my-profile';
import ChangePassword        from './components/customers/account/change-password';
import Documents             from './components/customers/account/documents/index';

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
        }, {
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
