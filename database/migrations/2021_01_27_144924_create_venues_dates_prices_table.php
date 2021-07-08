<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVenuesDatesPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venues_dates_prices', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('price')->nullable();
            $table->string('description_ar')->nullable();
            $table->string('description_en')->nullable();
            $table->integer('venue_id')->nullable();
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
        Schema::dropIfExists('venues_dates_prices');
    }
}
