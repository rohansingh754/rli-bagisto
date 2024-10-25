@props([
    'isActive' => false,
])

<v-modal-ask-to-joy
    is-active="{{ $isActive }}"
    {{ $attributes }}
>
    @isset($toggle)
        <template v-slot:toggle>
            {{ $toggle }}
        </template>
    @endisset

    @isset($header)
        <template v-slot:header="{ toggle, isOpen }">

        </template>
    @endisset

    @isset($content)
        <template v-slot:content>
            <div {{ $content->attributes->merge(['class' => 'bg-white p-2 px-9']) }}>
                {{ $content }}
            </div>
        </template>
    @endisset

    @isset($footer)
        <template v-slot:footer>
            <div {{ $content->attributes->merge(['class' => 'bg-white px-10 py-5 max-md:px-3 max-md:py-2']) }}>
                {{ $footer }}
            </div>
        </template>
    @endisset
</v-modal-ask-to-joy>

@pushOnce('scripts')
    <script
        type="text/x-template"
        id="v-modal-ask-to-joy-template"
    >
        <div>
            <div @click="toggle">
                <slot name="toggle">
                </slot>
            </div>

            <transition
                tag="div"
                name="modal-overlay"
                enter-class="duration-300 ease-out"
                enter-from-class="opacity-0"
                enter-to-class="opacity-100"
                leave-class="duration-200 ease-in"
                leave-from-class="opacity-100"
                leave-to-class="opacity-0"
            >
                <div
                    class="fixed inset-0 z-[999] bg-gray-500 bg-opacity-50 transition-opacity"
                    v-show="isOpen"
                ></div>
            </transition>

            <transition
                tag="div"
                name="modal-content"
                enter-class="duration-300 ease-out"
                enter-from-class="translate-y-4 opacity-0 md:translate-y-0 md:scale-95"
                enter-to-class="translate-y-0 opacity-100 md:scale-100"
                leave-class="duration-200 ease-in"
                leave-from-class="translate-y-0 opacity-100 md:scale-100"
                leave-to-class="translate-y-4 opacity-0 md:translate-y-0 md:scale-95"
            >
                <div
                    class="fixed inset-0 z-[999] transform overflow-y-auto transition" v-show="isOpen"
                >
                    <div class="flex min-h-full items-end justify-center p-4 sm:items-center sm:p-0">
                        <div class="absolute left-1/2 top-1/2 z-[999] w-full max-w-[570px] -translate-x-1/2 -translate-y-1/2 overflow-hidden bg-zinc-100 max-md:w-[90%] rounded-[57px] bg-white">
                            <!-- Header Slot-->
                            <div class='flex items-center justify-end gap-5 bg-white p-4 px-9'>
                                <span
                                    class="icon-cancel cursor-pointer rounded-full bg-[#F3F4F6] p-[10px] text-[15px] text-[#989898] max-md:text-[10px]"
                                    @click="toggle"
                                >
                                </span>
                            </div>

                            <div class="flex h-[250px] flex-col gap-2 overflow-auto max-md:px-[10px] md:gap-5 p-6">
                                <div class="flex h-full">

                                    <div class="h-full max-w-[323px] overflow-hidden rounded-[20px]">
                                        <div class="w-full h-full flex justify-center items-center">
                                            <img
                                                class="w-10/12 max-h-full rounded-[20px] my-auto"
                                                src="{{ bagisto_asset('images/ask-to-joy-1.png') }}"
                                                alt="Ask to Joy">
                                        </div>
                                    </div>

                                    <div class="h-full w-[45%] text-center">
                                        <div class="h-full flex justify-center items-center">
                                            <p class="text-[20px] font-bold max-md:text-[15px]">@lang('Im Joy, here to help you figure out which home to buy')</p>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- Footer Slot-->
                            <slot name="footer"></slot>
                        </div>
                    </div>
                </div>
            </transition>
        </div>
    </script>

    <script type="module">
        app.component('v-modal-ask-to-joy', {
            template: '#v-modal-ask-to-joy-template',

            props: ['isActive'],

            data() {
                return {
                    isOpen: this.isActive,
                };
            },

            created() {
                this.registerGlobalEvents();
            },

            methods: {
                toggle() {
                    this.isOpen = ! this.isOpen;

                    if (this.isOpen) {
                        document.body.style.overflow = 'hidden';
                    } else {
                        document.body.style.overflow ='auto';
                    }

                    this.$emit('toggle', { isActive: this.isOpen });
                },

                open() {
                    this.isOpen = true;

                    document.body.style.overflow = 'hidden';

                    this.$emit('open', { isActive: this.isOpen });
                },

                close() {
                    this.isOpen = false;

                    document.body.style.overflow = 'auto';

                    this.$emit('close', { isActive: this.isOpen });
                },

                registerGlobalEvents() {
                    this.$emitter.on('open-ask-to-joy-modal', this.open);
                },
            }
        });
    </script>
@endPushOnce
