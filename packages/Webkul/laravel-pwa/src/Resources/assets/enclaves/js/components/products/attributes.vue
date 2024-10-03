<template>
    <div class="mt-8">
        <h2 class="text-[15px] font-medium text-dark">House Features</h2>
        <div class="rounded-[20px] bg-[#F4F8FF]">
            <div
                v-for="(attribute, index) in viewableAttributes"
                :key="index"
                class="mt-5 grid grid-cols-2 items-start gap-x-10 gap-y-2 px-4 py-5 max-385:gap-x-4"
                v-if="attribute.value"
                >
                <div class="flex items-center gap-5 text-[12px] font-normal text-dark">
                    {{attribute.label}} :
                </div>
                <div class="">
                    <p class="text-[12px] font-medium text-dark">{{stripTags(attribute.value)}}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Accordian from '../shared/accordian';

    export default {
        name: 'attributes',

        components: { Accordian },

        props: ['product'],

        data () {
			return {
                viewableAttributes: []
            }
        },

        mounted () {
            this.getProductAdditinalInformation(this.product.id);
        },

        methods: {
            getProductAdditinalInformation (productId) {
                var this_this = this;

                EventBus.$emit('show-ajax-loader');

                this.$http.get('/api/v1/products/'+productId+'/additional-information')
                    .then(function(response) {

                        this_this.viewableAttributes = response.data.data;

                    })
                    .catch(function (error) {});

                EventBus.$emit('hide-ajax-loader');
            },

            stripTags (html){
                const div = document.createElement("div");
                div.innerHTML = html;
                let text = div.textContent || div.innerText || "";

                return text;
            },
        }
    }
</script>
