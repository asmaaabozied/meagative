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
            $table->timestamp('datetime')->nullable();
            $table->string('amount')->nullable();
            $table->string('currency')->nullable();
            $table->string('payment_brand')->nullable();
            $table->string('card_number')->nullable();
            $table->integer('customer_id')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('notes')->nullable();
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
