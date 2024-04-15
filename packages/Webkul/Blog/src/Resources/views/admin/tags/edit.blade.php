<x-admin::layouts>
    <x-slot:title>
        @lang('blog::app.tag.edit.title')
    </x-slot:title>

    @php
        $currentLocale = core()->getRequestedLocale();
    @endphp
    
    <!-- Blog Edit Form -->
    <x-admin::form
        :action="route('admin.blog.tag.update', $tag->id)"
        method="POST"
        enctype="multipart/form-data"
    >
        {!! view_render_event('admin.blog.tags.edit.before') !!}

        <div class="flex items-center justify-between gap-[16px] max-sm:flex-wrap">
            <p class="text-[20px] font-bold text-gray-800 dark:text-white">
                @lang('blog::app.tag.edit.title')
            </p>

            <div class="flex items-center gap-x-[10px]">
                <!-- Back Button -->
                <a
                    href="{{ route('admin.blog.tag.index') }}"
                    class="transparent-button hover:bg-gray-200 dark:text-white dark:hover:bg-gray-800"
                >
                    @lang('blog::app.tag.edit.back-btn')
                </a>

                <!-- Save Button -->
                <button
                    type="submit"
                    class="primary-button"
                >
                    @lang('blog::app.tag.edit.save-btn')
                </button>
            </div>
        </div>

        <!-- Full Panel -->
        <div class="mt-[14px] flex gap-[10px] max-xl:flex-wrap">

            <!-- Left Section -->
            <div class="flex flex-1 flex-col gap-[8px] max-xl:flex-auto">

                <!-- General -->
                <div class="box-shadow rounded-[4px] bg-white p-[16px] dark:bg-gray-900">
                    <p class="mb-[16px] text-[16px] font-semibold text-gray-800 dark:text-white">
                        @lang('blog::app.tag.edit.general')
                    </p>

                    <!-- Locales -->
                    <x-admin::form.control-group.control
                        type="hidden"
                        name="locale"
                        value="en"
                    >
                    </x-admin::form.control-group.control>

                    <!-- Name -->
                    <x-admin::form.control-group class="mb-2.5">
                        <x-admin::form.control-group.label class="required">
                            @lang('blog::app.tag.edit.name')
                        </x-admin::form.control-group.label>

                        <v-field
                            type="text"
                            name="name"
                            value="{{ old('name') ?? $tag->name }}"
                            label="{{ trans('blog::app.tag.edit.name') }}"
                            rules="required"
                            v-slot="{ field }"
                        >
                            <input
                                type="text"
                                name="name"
                                id="name"
                                v-bind="field"
                                :class="[errors['{{ 'name' }}'] ? 'border border-red-600 hover:border-red-600' : '']"
                                class="flex min-h-[39px] w-full rounded-md border px-3 py-2 text-sm text-gray-600 transition-all hover:border-gray-400 focus:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300 dark:hover:border-gray-400 dark:focus:border-gray-400"
                                placeholder="{{ trans('blog::app.tag.edit.name') }}"
                                v-slugify-target:slug="setValues"
                            >
                        </v-field>

                        <x-admin::form.control-group.error
                            control-name="name"
                        >
                        </x-admin::form.control-group.error>
                    </x-admin::form.control-group>

                    <!-- Slug -->
                    <x-admin::form.control-group class="mb-2.5">
                        <x-admin::form.control-group.label class="required">
                            @lang('blog::app.tag.edit.slug')
                        </x-admin::form.control-group.label>

                        <v-field
                            type="text"
                            name="slug"
                            value="{{ old('slug') ?? $tag->slug }}"
                            label="{{ trans('blog::app.tag.edit.slug') }}"
                            rules="required"
                            v-slot="{ field }"
                        >
                            <input
                                type="text"
                                name="slug"
                                id="slug"
                                v-bind="field"
                                :class="[errors['{{ 'slug' }}'] ? 'border border-red-600 hover:border-red-600' : '']"
                                class="flex min-h-[39px] w-full rounded-md border px-3 py-2 text-sm text-gray-600 transition-all hover:border-gray-400 focus:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300 dark:hover:border-gray-400 dark:focus:border-gray-400"
                                placeholder="{{ trans('blog::app.tag.edit.slug') }}"
                                v-slugify-target:slug
                            >
                        </v-field>

                        <x-admin::form.control-group.error
                            control-name="slug"
                        >
                        </x-admin::form.control-group.error>
                    </x-admin::form.control-group>

                    <!-- Description -->
                    <v-description>
                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label class="required">
                                @lang('blog::app.tag.edit.description')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="textarea"
                                name="description"
                                id="description"
                                class="description"
                                rules="required"
                                :value="old('description') ?? $tag->description"
                                :label="trans('blog::app.tag.edit.description')"
                                :tinymce="true"
                                :prompt="core()->getConfigData('general.magic_ai.content_generation.category_description_prompt')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="description"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>
                    </v-description>

                </div>

                <!-- SEO Details -->
                <div class="box-shadow rounded-[4px] bg-white p-[16px] dark:bg-gray-900">
                    <p class="mb-[16px] text-[16px] font-semibold text-gray-800 dark:text-white">
                        @lang('blog::app.tag.edit.search-engine-optimization')
                    </p>

                    <!-- SEO Title & Description Blade Component -->
                    <v-seo-helper-custom></v-seo-helper-custom>

                    <div class="mt-8">
                        <!-- Meta Title -->
                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label class="required">
                                @lang('blog::app.tag.edit.meta-title')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="meta_title"
                                id="meta_title"
                                rules="required"
                                :value="old('meta_title') ?? $tag->meta_title"
                                :label="trans('blog::app.tag.edit.meta-title')"
                                :placeholder="trans('blog::app.tag.edit.meta-title')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error control-name="meta_title"></x-admin::form.control-group.error>
                        </x-admin::form.control-group>

                        <!-- Meta Keywords -->
                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label class="required">
                                @lang('blog::app.tag.edit.meta-keywords')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="meta_keywords"
                                rules="required"
                                :value="old('meta_keywords') ?? $tag->meta_keywords"
                                :label="trans('blog::app.tag.edit.meta-keywords')"
                                :placeholder="trans('blog::app.tag.edit.meta-keywords')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error control-name="meta_keywords"></x-admin::form.control-group.error>
                        </x-admin::form.control-group>

                        <!-- Meta Description -->
                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label class="required">
                                @lang('blog::app.tag.edit.meta-description')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="textarea"
                                name="meta_description"
                                id="meta_description"
                                rules="required"
                                :value="old('meta_description') ?? $tag->meta_description"
                                :label="trans('blog::app.tag.edit.meta-description')"
                                :placeholder="trans('blog::app.tag.edit.meta-description')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error control-name="meta_description"></x-admin::form.control-group.error>
                        </x-admin::form.control-group>
                    </div>
                </div>
            </div>

            <!-- Right Section -->
            <div class="flex w-[360px] max-w-full flex-col gap-[8px]">
                <!-- Settings -->

                <x-admin::accordion>
                    <x-slot:header>
                        <p class="p-[10px] text-[16px] font-semibold text-gray-600 dark:text-gray-300">
                            @lang('blog::app.tag.edit.status')
                        </p>
                    </x-slot:header>

                    <x-slot:content>
                        <!-- Status -->
                        <v-setting-custom></v-setting-custom>

                        <x-admin::form.control-group>
                            <x-admin::form.control-group.label class="font-medium text-gray-800 dark:text-white">
                                @lang('blog::app.tag.edit.status')
                            </x-admin::form.control-group.label>

                            @php 
                                $selectedValueStatus = old('status') ?: $tag->status 
                            @endphp

                            <x-admin::form.control-group.control
                                type="switch"
                                name="status_switch"
                                name="status_switch"
                                class="cursor-pointer"
                                value="1"
                                :label="trans('blog::app.tag.edit.status')"
                                :checked="(boolean) $selectedValueStatus"
                            >
                            </x-admin::form.control-group.control>
                        </x-admin::form.control-group>
                    </x-slot:content>
                </x-admin::accordion>
                {!! view_render_event('admin.blog.tags.edit.before', ['tag' => $tag]) !!}
            </div>
        </div>
    </x-admin::form>

@pushOnce('scripts')
    <!-- SEO Vue Component Template -->
    <script type="text/x-template" id="v-setting-custom-template">
        <input 
            type="hidden" 
            name="status"
            id="status"
            value="@php echo $tag->status @endphp"
        >
    </script>

    <script type="module">
        app.component('v-setting-custom', {
            template: '#v-setting-custom-template',

            data() {
                return {
                }
            },

            mounted() {
                let self = this;

                document.getElementById('status_switch').addEventListener('change', function(e) {
                    document.getElementById('status').value = ( e.target.checked == true || e.target.checked == 'true' ) ? 1 : 0;
                });
            },
        });
    </script>
@endPushOnce

@pushOnce('scripts')
    <!-- SEO Vue Component Template -->
    <script type="text/x-template" id="v-seo-helper-custom-template">
        <div class="mb-[30px] flex flex-col gap-[3px]">
            <p 
                class="text-[#161B9D] dark:text-white"
                v-text="metaTitle"
            >
            </p>

            <p 
                class="text-[#161B9D] dark:text-white"
                style="display: none;"
                v-text="metaSlug"
            >
            </p>

            <!-- SEO Meta Title -->
            <p 
                class="text-[#135F29]"
                v-text="'{{ URL::to('/') }}/blog/tag/' + (metaSlug ? metaSlug.toLowerCase().replace(/\s+/g, '-') : '')"
            >
            </p>

            <!-- SEP Meta Description -->
            <p 
                class="text-gray-600 dark:text-gray-300"
                v-text="metaDescription"
            >
            </p>
        </div>
    </script>

    <script type="module">
        app.component('v-seo-helper-custom', {
            template: '#v-seo-helper-custom-template',

            data() {
                return {
                    metaTitle: this.$parent.getValues()['meta_title'],

                    metaDescription: this.$parent.getValues()['meta_description'],

                    metaSlug: this.$parent.getValues()['slug'],
                }
            },

            mounted() {
                let self = this;

                self.metaTitle = document.getElementById('meta_title').value;

                self.metaDescription = document.getElementById('meta_description').value;

                self.metaSlug = document.getElementById('slug').value;

                document.getElementById('meta_title').addEventListener('input', function(e) {
                    self.metaTitle = e.target.value;
                });

                document.getElementById('meta_description').addEventListener('input', function(e) {
                    self.metaDescription = e.target.value;
                });

                document.getElementById('name').addEventListener('input', function(e) {
                    setTimeout(function(){
                        var slug = document.getElementById('slug').value;
                        self.metaSlug = ( slug != '' && slug != null && slug != undefined ) ? slug : '';
                    }, 1000);
                });

                document.getElementById('slug').addEventListener('input', function(e) {
                    var slug = e.target.value;
                    self.metaSlug = ( slug != '' && slug != null && slug != undefined ) ? slug : '';
                });
            },
        });
    </script>
@endPushOnce
</x-admin::layouts>