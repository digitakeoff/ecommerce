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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('price');
            $table->string('description')->nullable();
            $table->string('state');
            $table->text('images');
            $table->string('city');
            $table->string('address');
            $table->string('user_id')->nullable();
            $table->enum('condition', ['brand-new', 'foreign-used', 'nigerian-used']);
            $table->string('main_image_index');
            $table->string('make_id');
            $table->string('model_id');
            $table->string('vin');
            $table->string('year');
            $table->string('ext_color');
            $table->string('int_color');
            $table->string('vehicle_drive');
            $table->string('transmission');
            $table->string('body_type');
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
        Schema::dropIfExists('cars');
    }
};
