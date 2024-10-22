<v-partners-card
    {{ $attributes }}
    :partner="blog"
>
</v-partners-card>

@pushOnce('scripts')
    <script type="text/x-template" id="v-partners-card-template">

            <div class="rounded-[30px] bg-white px-5 py-6 shadow-[20px_4px_54px] shadow-black/10">
                <div class="h-48 w-full overflow-hidden max-md:h-60">
                    <x-shop::media.images.lazy
                        class="h-full w-full rounded-lg object-cover"
                        ::src="'{{ bagisto_asset('images/partner-1.png') }}'"
                    >
                    </x-shop::media.images.lazy>
                </div>
                <h3 class="mt-7 text-xl font-bold text-dark max-sm:text-lg">Affiliate Marketer</h3>
                <p class="mt-7 line-clamp-[8] overflow-hidden text-ellipsis text-lg font-normal text-dark max-sm:text-base">
                    Are you looking to boost your income effortlessly? <br><br>
                    Join our "Affiliate Marketer" program today! Perfect for digital marketers, social media influencers, housewives and office worker.<br><br>
                    Here’s how it works
                </p>
                <div class="mt-7 flex items-center justify-between gap-[2px]">
                    <a href="#" class="block rounded-full border border-primary px-6 py-[18px] text-center text-lg font-normal text-primary max-xl:w-2/5 max-xl:px-2 max-sm:text-base">Read more</a>
                    <a href="#" class="block rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-20 py-5 text-center text-lg font-normal text-white max-[1270px]:px-14 max-xl:w-3/5 max-xl:px-2 max-sm:text-base">Join Us</a>
                </div>
            </div>
    </script>

    <script type="module">
        app.component('v-partners-card', {
            template: '#v-partners-card-template',

            props: ['mode', 'partner'],

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
