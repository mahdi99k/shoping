<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryPropertyGroupTable extends Migration
{

    public function up()
    {
        Schema::create('category_property_group', function (Blueprint $table) {
            $table->foreignId('category_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('property_group_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->primary(['category_id' , 'property_group_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('category_property_group');
    }
}
