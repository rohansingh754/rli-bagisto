<div class="container px-[60px] max-lg:px-[30px] max-lg:px-[15px]">
    <div class="flex gap-[40px] md:mt-[40px] items-start max-lg:gap-[20px]">
        <!-- Desktop Filter Shimmer Effect -->

        <div class="flex-1">
            <!-- Desktop Toolbar Shimmer Effect -->
            <div class="grid grid-cols-2 gap-24 max-lg:gap-12 max-md:grid-cols-1">
                <div v-for="col in ['one', 'two']">
                    <p class="shimmer h-[24px] w-[150px]"></p>
                    <div class="mt-11 grid grid-cols-2 gap-x-8 gap-y-11 max-sm:grid-cols-1">
                        <!-- Product Card Shimmer Effect -->
                        @for ($i = 0;  $i < $count; $i++)
                            <div class="grid gap-4 relative w-full max-lg:grid-cols-1 {{ $attributes['class'] }}">
                                <div class="relative rounded-sm">
                                    <div class="shimmer h-[290px] w-full rounded-[20px] max-lg:hidden"></div>

                                    <div class="shimmer hidden h-[125px] w-full rounded-[20px] max-lg:block"></div>
                                </div>

                                <div class="flex flex-wrap content-start gap-3">
                                    <p class="shimmer h-[24px] w-[75%]"></p>
                                    <p class="shimmer h-[24px] w-[55%]"></p>

                                    <!-- Needs to implement that in future -->
                                    <div class="mt-[12px] flex hidden gap-4">
                                        <span class="shimmer block h-[30px] w-[30px] rounded-full"></span>
                                        <span class="shimmer block h-[30px] w-[30px] rounded-full"></span>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>

            <button class="shimmer block w-[171.516px] h-[48px] mt-[60px] mx-auto py-[11px] rounded-[18px]"></button>
        </div>
    </div>
</div>
