<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function permissions(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Permission::class);   // نقش ها (سوپر ادمنی) متلق به کلی مجوز دسترسی مثل دسته بندی و برند ها و محصولات (عملیات کراد)
    }

    public function hasPermission($permission)   // اگر وجود داشت پرمیژن آیدی برابر آیدی نقش و بیا select حالت فعال
    {
        return $this->permissions()->where('id' , '=' , $permission->id )->exists();  // اگر آیدی نقش برابر پرمیژن باش و وجود داشت
    }

}
