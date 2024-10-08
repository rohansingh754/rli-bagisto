<template>
    <guest-home v-if="!customer"></guest-home>
    <customer-home v-else></customer-home>
</template>

<script>
    import GuestHome           from "./guest-home";
    import CustomerHome        from "./customer-home";

    export default {
        name: 'home',

        components: {
            GuestHome,
            CustomerHome
        },

        data: function () {
			return {
                themeAssets: window.config.themeAssetsPath,
                // customer:null,
			}
        },

        computed:{
            customer(){
                return JSON.parse(localStorage.getItem('currentUser'));
            }
        },

        mounted () {
            // this.customer = JSON.parse(localStorage.getItem('currentUser'));
            console.log(this.customer);

        },

        methods: {

        }
    }
</script>
