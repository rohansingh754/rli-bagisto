<template>
    <div class="rounded-[9px] p-3 shadow-[0px_4px_4px] shadow-black/10">
        <img
            :src="category.logo_url ? category.logo_url : '/themes/pwa/default/build/assets/images/category-image.png'"
            alt="elenvital"
            class="w-auto"
            />
        <div class="mt-5 min-h-[58px]">
            <p class="text-[9px] font-bold text-[#343064]">
                {{category.name}}
            </p>
            <p class="mt-2 text-[9px] font-bold text-[#343064]">
                {{truncateText(stripTags(category.description), 95)}}
            </p>
        </div>

        <router-link :to="'/categories/' + category.id">
            <button class="mt-5 inline-block w-full rounded-full border-[.5px] border-primary px-[5px] py-2 text-center font-poppins text-[7px] font-medium text-primary">Visit Store</button>
        </router-link>
    </div>
</template>

<script>
    export default {
        name: 'category-card',

        props: ['category'],

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
        }
    }
</script>
