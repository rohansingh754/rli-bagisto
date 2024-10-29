<?php

namespace Webkul\Enclaves\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// Path: php artisan db:seed --class="Webkul\\Enclaves\\Database\Seeders\\AttributeTableSeeder"

class AttributeTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @param  array  $parameters
     * @return void
     */
    public function run($parameters = [])
    {
        $now = Carbon::now();
        $defaultLocale = $parameters['default_locale'] ?? config('app.locale');

        $newAttributes = [
            [
                'code'                => 'ekyc_redirect_uri',
                'admin_name'          => trans('enclaves::app.admin.seeders.attribute.redirect_uri', [], $defaultLocale),
                'type'                => 'text',
                'validation'          => null,
                'position'            => 1,
                'is_required'         => 1,
                'is_unique'           => 1,
                'value_per_locale'    => 0,
                'value_per_channel'   => 0,
                'default_value'       => null,
                'is_filterable'       => 0,
                'is_configurable'     => 0,
                'is_user_defined'     => 0,
                'is_visible_on_front' => 0,
                'is_comparable'       => 0,
                'enable_wysiwyg'      => 0,
                'created_at'          => $now,
                'updated_at'          => $now,
            ],
            [
                'code'                => 'schedule_visit_redirect_url',
                'admin_name'          => trans('enclaves::app.admin.seeders.attribute.schedule_visit_redirect_url', [], $defaultLocale),
                'type'                => 'text',
                'validation'          => null,
                'position'            => 1,
                'is_required'         => 1,
                'is_unique'           => 1,
                'value_per_locale'    => 0,
                'value_per_channel'   => 0,
                'default_value'       => null,
                'is_filterable'       => 0,
                'is_configurable'     => 0,
                'is_user_defined'     => 0,
                'is_visible_on_front' => 0,
                'is_comparable'       => 0,
                'enable_wysiwyg'      => 0,
                'created_at'          => $now,
                'updated_at'          => $now,
            ],
            [
                'code'                => 'avail_now_redirect_url',
                'admin_name'          => trans('enclaves::app.admin.seeders.attribute.avail_now_redirect_url', [], $defaultLocale),
                'type'                => 'text',
                'validation'          => null,
                'position'            => 1,
                'is_required'         => 1,
                'is_unique'           => 1,
                'value_per_locale'    => 0,
                'value_per_channel'   => 0,
                'default_value'       => null,
                'is_filterable'       => 0,
                'is_configurable'     => 0,
                'is_user_defined'     => 0,
                'is_visible_on_front' => 0,
                'is_comparable'       => 0,
                'enable_wysiwyg'      => 0,
                'created_at'          => $now,
                'updated_at'          => $now,
            ],
        ];


        foreach ($newAttributes as $attr) {
            $isExits = DB::table('attributes')->where('code', $attr['code'])->first();

            if (!$isExits) {
                $insertedAttrId = DB::table('attributes')->insertGetId(
                    [
                        'code'                => $attr['code'],
                        'admin_name'          => $attr['admin_name'],
                        'type'                => $attr['type'],
                        'validation'          => $attr['validation'],
                        'position'            => $attr['position'],
                        'is_required'         => $attr['is_required'],
                        'is_unique'           => $attr['is_unique'],
                        'value_per_locale'    => $attr['value_per_locale'],
                        'value_per_channel'   => $attr['value_per_channel'],
                        'default_value'       => $attr['default_value'],
                        'is_filterable'       => $attr['is_filterable'],
                        'is_configurable'     => $attr['is_configurable'],
                        'is_user_defined'     => $attr['is_user_defined'],
                        'is_visible_on_front' => $attr['is_visible_on_front'],
                        'is_comparable'       => $attr['is_comparable'],
                        'enable_wysiwyg'      => $attr['enable_wysiwyg'],
                        'created_at'          => $now,
                        'updated_at'          => $now,
                    ],
                );

                $locales = $parameters['allowed_locales'] ?? [$defaultLocale];

                foreach ($locales as $locale) {
                    DB::table('attribute_translations')->insert([
                        [
                            'locale'       => $locale,
                            'name'         => trans('enclaves::app.admin.seeders.attribute.' . $attr['code'], [], $locale),
                            'attribute_id' => $insertedAttrId,
                        ],
                    ]);
                }

                $attributeGroupId = DB::table('attribute_groups')->where('code', 'general')->first()->id;

                DB::table('attribute_group_mappings')->insert([
                    [
                        'attribute_id'        => $insertedAttrId,
                        'attribute_group_id'  => $attributeGroupId,
                        'position'            => 3,
                    ],
                ]);
            }
        }
    }
}
