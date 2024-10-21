<?php

namespace Webkul\EnclavePwa\Database\Seeders;

use Illuminate\Database\Seeder;

use Webkul\EnclavePwa\Database\Seeders\CMS\DatabaseSeeder as CMSSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the enclave pages.
     *
     * Command: php artisan db:seed --class=Webkul\\EnclavePwa\\Database\\Seeders\\DatabaseSeeder
     *
     * @return void
     */
    public function run()
    {
        $this->call(CMSSeeder::class);
    }
}
