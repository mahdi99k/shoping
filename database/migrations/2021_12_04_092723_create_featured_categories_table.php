<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeaturedCategoriesTable extends Migration
{

    public function up()
    {
        Schema::create('featured_categories', function (Blueprint $table) {
            $table->foreignId('category_id')->constrained()->onDelete('cascade')->onUpdate('cascade');  // دسته ویژه
            $table->primary('category_id');  // فقط یک رکورد در دیتابیس به عنوان دسته ویژه باید ذخیره بشه
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('featured_categories');
    }
}
