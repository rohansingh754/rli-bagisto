<template>
    <div class="content">

    </div>
</template>

<script>

    import {mapState, mapActions} from 'vuex';

    export default {
        name: 'my-properties',

        components: {

        },

        data: function () {
			return {
                themeAssets: window.config.themeAssetsPath,
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
        }
    }
</script>
