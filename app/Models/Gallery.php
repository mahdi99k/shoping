<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function product()  // مفرد اسم
    {
        return $this->belongsTo(Product::class , 'product_id');   // هر محصول میتونه چندین تا گالری یا عکس داشته باشه | متعلق به محصول
    }

}
