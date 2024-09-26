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
        </div>
        <router-link :to="'/categories/' + category.id">
            <button class="mt-5 inline-block w-full rounded-full border-[.5px] border-primary px-[5px] py-2 text-center font-poppins text-[7px] font-medium text-primary">Visit Store</button>
        </router-link>
    </div>
</template>

<script>
    export default {
        name: 'category-card',

        props: ['category']
    }
</script>

<style lang="scss" scoped>
    li.category-card {
        width: 120px;
        height: 152px;
        margin-right: 15px;
        position: relative;
        vertical-align: top;
        display: inline-block;
        background: #FFFFFF;
        box-shadow: 0 6px 10px 0 rgba(0,0,0,0.08), 0 1px 18px 0 rgba(0,0,0,0.08), 0 3px 5px -1px rgba(0,0,0,0.08);

        &:last-child {
            margin-right: 0;
        }

        .image {
            height: 120px;

            img {
                width: 100%;
                height: 100%;
            }
        }

        .name {
            width: 7rem;
            height: 32px;
            font-size: 12px;
            margin: 0 auto;
            overflow: hidden;
            line-height: 32px;
            text-align: center;
            text-overflow: ellipsis;
            color: rgba(0, 0, 0, 0.56);
        }
    }
</style>
