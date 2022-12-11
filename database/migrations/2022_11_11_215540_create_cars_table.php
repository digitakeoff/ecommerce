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
            $table->text('description')->nullable();
            $table->integer('state_id');
            $table->text('images');
            $table->integer('city_id');
            $table->string('address');
            $table->integer('user_id');
            $table->enum('condition', ['brand-new', 'foreign-used', 'nigerian-used']);
            $table->string('main_image_index');
            $table->integer('make_id');
            $table->integer('model_id');
            $table->string('vin');
            $table->string('year');
            $table->string('fuel');
            $table->string('ext_color');
            $table->string('int_color');
            $table->string('vehicle_drive');
            $table->string('transmission');
            $table->integer('bodytype_id');
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
