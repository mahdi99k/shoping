<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];                    // delete data in the column deleted_at

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');  // هر محصول برای یک دسته بندی و دسته محصولات برده متلق به جدول دسته بندی
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');  // هر محصول برای یک برند و دسته محصولات برده متلق به جدول دسته بندی
    }


    public function galleies()
    {
        return $this->hasMany(Gallery::class, 'product_id');   // هر محصول میتونه کلی گالری داشته باشه
    }


    public function getRouteKeyName()    // getRouteKeyName | میتونه براس ستون های درون جدول یمقدار بگیره به کل این مادل بده
    {
        return 'slug';  // تو کا پروژه قرار میگیره
    }


    /*
     public function addGallery(Request $request)
    {
        $file = $request->file('file');
        $path = $file->storeAs('public/productGallery' , $file->getClientOriginalName());

        $this->galleies()->create([
            'product_id' => $this->id,
            'path' => $path,
            'mimes' => $file->getClientMimeType(),   // show type image
        ]);
    }*/


    public function deleteGallery(Gallery $gallery)
    {
        Storage::delete($gallery->path);  // unlink | میاد عکس حذف میکنه
        $gallery->delete();
    }


}
