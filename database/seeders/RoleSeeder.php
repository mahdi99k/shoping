<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {

        // super-admin roles  |  create  (created_at  updated_at is full)
        $superAdmin = Role::query()->create([
            'title' => 'super-admin',
        ]);
        $superAdmin->permissions()->attach(Permission::all());  // بیا اضافه کن هرچی پرمیژن یا مجوز که وجود داره دسترسی دارد به سوپر ادمین بده


        // normal-user  |  insert  (created_at  updated_at is null)
        Role::query()->insert([
            'title' => 'normal-user',
        ]);

    }
}
