<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsTable extends Migration
{

    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('value');   // اعداد صحیح که منفی نباشد
            $table->timestamps();
        });
    }



    public function down()
    {
        Schema::dropIfExists('discounts');
    }
}
