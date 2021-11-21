<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {

        $roleAdminUser = Role::query()->where('title', 'super-admin')->first();  // عنوان برابر بود با سوپر ادمنی بیا مشخصات کامل اولی بگیرش که بفهمه ادمینم
        User::query()->create([
            'role_id' => $roleAdminUser->id,
            'name' => 'admin-user',
            'email' => 'mahdishmshm13781999@gmail.com',
            'password' => Hash::make("mahdi1378"),
        ]);
    }
}
