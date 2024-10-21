<?php

namespace Webkul\Enclaves\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// Path: php artisan db:seed --class="Webkul\\Enclaves\\Database\Seeders\\CmsTableSeeder"

class CmsTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @param  array  $parameters
     * @return void
     */
    public function run()
    {
        $pages = [
            [
                "url_key" => 'about-us',
                "page_title" => trans('enclaves::app.admin.seeders.pages.about-us.title'),
                "meta_title" => 'About us',
                "meta_description" => 'About us',
                "meta_keywords" => 'aboutus',
                "html_content" => view('enclaves::admin.cms.seeders.about-us')->render(),
            ],
            [
                "url_key" => 'contact-us',
                "page_title" => trans('enclaves::app.admin.seeders.pages.contact-us.title'),
                "meta_title" => 'Contact Us',
                "meta_description" => 'Contact Us',
                "meta_keywords" => 'contactus',
                "html_content" => view('enclaves::admin.cms.seeders.contact-us')->render(),
            ],
        ];

        foreach ($pages as $page) {
            $pageExits = DB::table('cms_page_translations')->where('url_key', $page['url_key'])->first();

            if ($pageExits) {
                DB::table('cms_pages')->where('id', $pageExits->cms_page_id)->delete();

                DB::table('cms_page_translations')->where('url_key', $page['url_key'])->delete();
            }

            $insertedPageId = DB::table('cms_pages')->insertGetId(
                [
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );

            $defaultLocale = core()->getCurrentLocale()->code ?? config('app.locale');

            $locales = core()->getAllLocales()->pluck('code') ?? [$defaultLocale];

            foreach ($locales as $locale) {
                DB::table('cms_page_translations')->insert([
                    [
                        'locale'           => $locale,
                        'cms_page_id'      => $insertedPageId,
                        'url_key'          => $page['url_key'],
                        'html_content'     => $page['html_content'],
                        'page_title'       => trans('enclaves::app.admin.seeders.pages.' . $page['url_key'] . '.title', [], $locale),
                        'meta_title'       => $page['meta_title'],
                        'meta_description' => $page['meta_description'],
                        'meta_keywords'    => $page['meta_keywords'],
                    ],
                ]);
            }
        }
    }
}
