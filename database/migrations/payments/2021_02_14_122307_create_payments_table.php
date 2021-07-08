<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('payment_type')->nullable();
            $table->longText('data_id')->nullable();
            $table->longText('payment_id')->nullable();
            $table->integer('datetime')->nullable();
            $table->integer('amount')->nullable();
            $table->integer('currency')->nullable();
            $table->integer('payment_brand')->nullable();
            $table->integer('card_number')->nullable();
            $table->integer('customer_id	')->nullable();
            $table->integer('customer_email')->nullable();
            $table->integer('notes')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
