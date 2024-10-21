<?php

namespace Webkul\EnclavePwa\Database\Seeders\CMS;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the enclave pages.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CMSPagesTableSeeder::class);
    }
}
