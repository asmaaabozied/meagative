<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('name')->nullable();
            $table->integer('city_id')->nullable();
            $table->string('company_name')->nullable();

            $table->string('mobile')->nullable();
            $table->string('mobile_verified')->nullable();
            $table->string('mobile_verification_code')->nullable();
            $table->string('password')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->string('salt')->nullable();
            $table->string('password_changed')->nullable();
            $table->string('password_reset_code')->nullable();
            $table->string('emergency_mobile')->nullable();
            $table->integer('country_id')->nullable();
            $table->string('address')->nullable();
            $table->string('birth_date')->nullable();
            $table->string('registered_date')->nullable();
            $table->string('last_login_date')->nullable();

            $table->string('photo_file')->nullable();
            $table->string('personal_file')->nullable();
            $table->string('company_file')->nullable();
            $table->string('firebase_token')->nullable();
            $table->string('points')->nullable();
            $table->string('active')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
