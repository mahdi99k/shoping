<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{

    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade')->onUpdate('cascade');      // خودکار پیدا میکنه کلید خارجی
            $table->foreignId('brand_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->string('slug')->unique();     // برای آپدیت و دلیت و ساخت دیتا ها آیدی نمایش نده اسلاگ نمایش بده
            $table->integer('price');
            $table->text('image');
            $table->string('description' , 2000);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');    // if exist column categories go drop OR delete
    }
}
