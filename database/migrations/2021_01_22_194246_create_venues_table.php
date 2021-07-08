<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venues', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar')->nullable();
            $table->string('name_en')->nullable();
            $table->string('description_ar')->nullable();
            $table->string('description_en')->nullable();
            $table->integer('venue_type_id')->nullable();
            $table->integer('country_id')->nullable();

            $table->integer('city_id')->nullable();

            $table->string('image')->nullable();
            $table->string('price')->nullable();
            $table->string('capacity')->nullable();
            $table->string('capacity_female')->nullable();
            $table->integer('capacity_male')->nullable();

            $table->string('capacity_childrens')->nullable();
            $table->string('capacity_babies')->nullable();
            $table->string('address_ar')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('image')->nullable();
            $table->string('price')->nullable();
            $table->string('time_open')->nullable();
            $table->string('time_start')->nullable();
            $table->string('time_end')->nullable();

            $table->string('time_close')->nullable();
            $table->string('address_en')->nullable();
            $table->string('active')->nullable();
            $table->string('parking')->nullable();


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
        Schema::dropIfExists('venues');
    }
}
