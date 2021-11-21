<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([                               // سییدر هایی که ساختیم پاس میدیم به این قسمت اصلی که تو جدول ما ببره | call صدا زدن سییدر
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
        ]);

    }
}
