<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('city_code')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_ar')->nullable();
            $table->integer('country_id')->nullable();
            $table->string('code')->nullable();
            $table->string('sort')->nullable();
            $table->integer('active')->nullable();
            $table->string('synced')->nullable();
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
        Schema::dropIfExists('cities');
    }
}
