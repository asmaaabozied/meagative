<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersLoginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers_login', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id')->nullable();
            $table->longText('Identity_type')->nullable();
            $table->longText('Identity_value')->nullable();
            $table->string('os')->nullable();
            $table->string('bundle_id')->nullable();
            $table->string('version')->nullable();
            $table->string('device_id')->nullable();
            $table->string('device_token')->nullable();
            $table->string('device_ip_address')->nullable();
            $table->string('location')->nullable();
            $table->string('login_datetime')->nullable();
            $table->string('last_activity_datetime')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('customers_logins');
    }
}
