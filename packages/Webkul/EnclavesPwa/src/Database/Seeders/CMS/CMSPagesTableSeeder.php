<?php

namespace Webkul\EnclavePwa\Database\Seeders\CMS;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CMSPagesTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * Command: php artisan db:seed --class=Webkul\\EnclavePwa\\Database\\Seeders\\CMS\\CMSPagesTableSeeder
     */
    public function run()
    {
        $pages = [
            [
                "url_key" => 'pwa-about-us',
                "page_title" => trans('enclave-pwa::admin.cms.pages.pwa-about-us.title'),
                "meta_title" => 'About us',
                "meta_description" => 'About us',
                "meta_keywords" => 'aboutus',
                "html_content" => view('enclave-pwa::shop.enclaves.seederpages.about-us')->render(),
            ],
            [
                "url_key" => 'pwa-join-us',
                "page_title" => trans('enclave-pwa::admin.cms.pages.pwa-join-us.title'),
                "meta_title" => 'Join us',
                "meta_description" => 'Join us',
                "meta_keywords" => 'joinus',
                "html_content" => view('enclave-pwa::shop.enclaves.seederpages.join-us')->render(),
            ],
            [
                "url_key" => 'pwa-contact-us',
                "page_title" => trans('enclave-pwa::admin.cms.pages.pwa-contact-us.title'),
                "meta_title" => 'Contact Us',
                "meta_description" => 'Contact Us',
                "meta_keywords" => 'contactus',
                "html_content" => view('enclave-pwa::shop.enclaves.seederpages.contact-us')->render(),
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
                        'page_title'       => trans('enclave-pwa::app.admin.cms.pages.' . $page['url_key'] . '.title', [], $locale),
                        'meta_title'       => $page['meta_title'],
                        'meta_description' => $page['meta_description'],
                        'meta_keywords'    => $page['meta_keywords'],
                    ],
                ]);
            }
        }
    }
}
