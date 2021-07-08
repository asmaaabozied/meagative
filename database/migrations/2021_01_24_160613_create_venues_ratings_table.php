<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVenuesRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venues_ratings', function (Blueprint $table) {
            $table->id();
            $table->string('description')->nullable();
            $table->string('rate')->nullable();
            $table->string('datetime')->nullable();
            $table->integer('customer_id')->nullable();
            $table->integer('venue_id')->nullable();
            $table->integer('active')->nullable();
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
        Schema::dropIfExists('venues_ratings');
    }
}
