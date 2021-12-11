<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGurantorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gurantors', function (Blueprint $table) {
            $table->id();
            $table->string('fullname')->nullable();
            $table->string('card_number')->nullable();
            $table->string('phone')->nullable();
            $table->integer('citizen_id')->nullable();
            $table->timestamps();
            $table->softDeletes()->nullable();
            $table->userstamps();
            $table->softUserstamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gurantors');
    }
}
