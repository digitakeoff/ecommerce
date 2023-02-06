<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('slug')->nullable()->unique();
            $table->string('price');
            $table->integer('state_id');
            $table->integer('city_id');
            $table->string('address');
            $table->integer('user_id');
            $table->integer('year');
            $table->enum('condition', ['new', 'used', 'refurbished']);
            $table->string('main_image_index');
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('model_id');
            $table->string('color');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
