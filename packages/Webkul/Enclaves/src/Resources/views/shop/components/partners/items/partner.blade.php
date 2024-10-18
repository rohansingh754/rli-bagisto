<v-partner-card
    {{ $attributes }}
    :blog="blog"
>
</v-partner-card>

@pushOnce('scripts')
    <script type="text/x-template" id="v-partner-card-template">
        <div class="cursor-pointer max-lg:min-w-[120px] md:min-w-64 lg:min-w-[300px]">
            <x-shop::media.images.lazy
                class="h-32 w-full rounded-3xl shadow-inner transition-all duration-300 group-hover:scale-105 md:h-72 lg:h-72"
                ::src="blog.base_image"
                ::alt="blog.base_image"
            ></x-shop::media.images.lazy>

            <p
                class="font-popins mt-5 overflow-hidden text-ellipsis whitespace-nowrap text-[20px] font-bold max-sm:text-[14px]"
                v-text="blog.name"
            ></p>

            <button
                @click="redirectBlogPage(blog)"
                class="w-full mt-[5px] rounded-full border-[1px] border-[#CC035C] pl-3 pr-3 py-1.5 text-[#CC035C] max-sm:text-[12px]">
                @lang('blog::app.shop.blog.read-more')
            </button>
        </div>
    </script>

    <script type="module">
        app.component('v-partner-card', {
            template: '#v-partner-card-template',

            props: ['mode', 'blog'],

            data() {
                return {
                    isCustomer: '{{ auth()->guard("customer")->check() }}',
                }
            },

            methods: {
                redirectBlogPage(blog) {
                    window.location.href = `{{ route('shop.article.view','') }}/` + blog.slug;
                },
            }
        });
    </script>
@endpushOnce
