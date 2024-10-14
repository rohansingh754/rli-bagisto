<template>
	<img
        :src="src ?? themeAssets + 'images/category-image.png'"
        :class="classes ?? ''"
        :alt="alt ?? 'Picture'"
        :height="height ?? ''"
        :width="width ?? ''"
        />
</template>

<script>

    import {
        mapState,
        mapActions
    } from 'vuex';

    export default {
        name: 'image-component',

        props: ['src', 'classes', 'alt', 'height', 'width'],

        data() {
            return {
                themeAssets: window.config.themeAssetsPath,
            }
        },

		mounted() {

		},

		methods: {

		},
    }
</script>
