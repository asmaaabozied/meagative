<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers_emails', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id')->nullable();
            $table->string('email')->nullable();
            $table->string('email_verified')->nullable();
            $table->string('email_verification_code')->nullable();
            $table->integer('identity_type')->nullable();
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
        Schema::dropIfExists('customers_emails');
    }
}
