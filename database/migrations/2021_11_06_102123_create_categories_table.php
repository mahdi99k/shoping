<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{

    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            //constrained خودش میاد تشخیص میده که دسته پدر(کلید خارجی) یا نه | onDelete('cascade') پدر حذف شد دسته فرزند حذف | onUpdate('cascade') آپدیت شد فرزند هم آپدیت بشه
//          $table->foreignId('category_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade'); // روابط منی تو منی بهتر
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->on('categories')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->string('title_fa')->unique();
            $table->string('title_en')->unique()->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');  // if exist column categories go drop OR delete
    }
}
