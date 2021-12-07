<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyGroup extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function properties(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Property::class , 'property_group_id');  // هر گروه مشخصات تعداد زیادی دارد زیر عنوان مشخصات
    }

}
