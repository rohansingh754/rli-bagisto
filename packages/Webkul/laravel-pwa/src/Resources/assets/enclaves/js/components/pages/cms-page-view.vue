<template>
    <div v-html="page.html_content"> </div>
</template>

<script>
	import Support                  from './support';
    import { mapState, mapActions} from 'vuex';

    export default {
        name: 'cms-page-view',

		components: {
            Support,
		},

        props: ['page'],

        watch: {
            $route (to, from) {
                window.location.href = window.config.app_base_url + '' + window.config.prefix.replace('/','') + to.fullPath;
            }
        },
    }
</script>
