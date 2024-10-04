<template>
	<section class="pt-[25px]">
		<div class="container">
			<div class="font-popins flex justify-start">
				<div class="flex items-center gap-x-[10px]">
					<p
						v-for="(link, index) in links" :key="index"
						:class="link.redirect ? 'flex items-center gap-x-[10px] text-[12px] font-medium text-dark' : 'text-[12px] font-medium text-text-gray'"
					>
						<span v-if="link.redirect">
        					<router-link :to="link.redirect">
								{{truncateText(link.name, 20)}}
							</router-link>
						</span>
						<span v-else>
							{{truncateText(link.name, 20)}}
						</span>
						<span v-if="link.redirect" class="icon-arrow-right text-[10px] font-extrabold"></span>
					</p>
				</div>
			</div>
			<div>
				<slot></slot>
			</div>
		</div>
	</section>
</template>

<script>

    import {
        mapState,
        mapActions
    } from 'vuex';

    export default {
        name: 'breadcrumb',

        props: ['links'],

		methods: {
            truncateText(text, maxLength) {
                if (text.length <= maxLength) {
                    return text;
                }

                return text.substring(0, maxLength) + '...';
            },
		},
    }
</script>
