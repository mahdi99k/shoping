<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPropertyTable extends Migration
{

    public function up()
    {
        Schema::create('product_property', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('property_id')->constrained()->onDelete('cascade')->onUpdate('cascade'); // subtitle propertyGroup
            $table->string('value')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_property');
    }
}
