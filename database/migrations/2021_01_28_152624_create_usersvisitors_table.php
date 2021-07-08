<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersvisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usersvisitors', function (Blueprint $table) {
            $table->id();
            $table->string('device_ip')->nullable();
            $table->string('country')->unique()->nullable();
            $table->string('city')->unique();
            $table->string('os')->nullable();

            $table->string('timezome')->unique();
            $table->string('name')->nullable();
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
        Schema::dropIfExists('usersvisitors');
    }
}
