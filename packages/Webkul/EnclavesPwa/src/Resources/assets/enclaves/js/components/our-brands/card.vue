<template>
    <div class="mt-3 grid grid-cols-3 gap-[9px]">
        <div
            v-for="category in brands"
            class="rounded-[9px] p-3 shadow-[0px_4px_4px] shadow-black/10">
            <img
                :src="'/storage/' + category.community_banner_path"
                alt="elenvital"
                class="w-auto h-[37px]"
                />
            <div class="mt-5 min-h-[58px]">
                <!-- <p class="text-[9px] font-bold text-[#343064]">
                    {{category.name}}
                </p> -->
                <!-- <p class="mt-2 text-[9px] font-bold text-[#343064]">
                    {{truncateText(stripTags(category.description), 95)}}
                </p> -->
                <div class="mt-5 min-h-[58px]">
                    <p class="text-[9px] font-bold text-[#343064]">
                        House & Lot<br>
                        ₱2.8M - ₱7.5M
                    </p>
                    <p class="mt-2 text-[9px] font-bold text-[#343064]">
                        Middle Condo<br>
                        ₱2.7M - ₱4.8M
                    </p>
                </div>
            </div>

            <router-link
            :to="{ name: 'category', params: { id: category.id, drawerKey:'storeDetails' } }"
            >
                <button class="mt-5 inline-block w-full rounded-full border-[.5px] border-primary px-[5px] py-2 text-center font-poppins text-[7px] font-medium text-primary">{{ $t('Visit Store') }}</button>
            </router-link>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'our-brands-card',

        props: ['categories'],

        data() {
            return {
                brands: [],
                themeAssets: window.config.themeAssetsPath,
            }
        },

        watch: {
            categories: function (data) {
                if (data.length) {
                    let categoryIds = data.map(item => item.id);
                    this.getCategories(categoryIds);
                }
            },
        },

        methods: {
			stripTags(html){
                const div = document.createElement("div");
                div.innerHTML = html;
                let text = div.textContent || div.innerText || "";

                return text;
            },

            truncateText(text, maxLength) {
                if (text.length <= maxLength) {
                    return text;
                }

                return text.substring(0, maxLength) + '...';
            },

            async getCategories(ids) {
                try {
                    EventBus.$emit('show-ajax-loader');

                    const response = await this.$http.get("/api/pwa/categories", { params: { ids: ids} });

                    this.brands = response.data.data;

                    EventBus.$emit('hide-ajax-loader');

                } catch (error) {
                    console.error(error);
                }
            }
        }
    }
</script>
