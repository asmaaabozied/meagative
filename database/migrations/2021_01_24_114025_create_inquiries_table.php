<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('guests_male')->nullable();
            $table->string('guests_female')->nullable();
            $table->string('description')->nullable();
            $table->string('status')->nullable();
            $table->string('end_date')->nullable();
            $table->integer('event_id')->nullable();
            $table->string('start_date')->nullable();
            $table->integer('planner_id')->nullable();
            $table->integer('customer_id')->nullable();
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
        Schema::dropIfExists('inquiries');
    }
}
