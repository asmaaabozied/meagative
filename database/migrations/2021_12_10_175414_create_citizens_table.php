<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitizensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citizens', function (Blueprint $table) {
            $table->id();
            $table->string('first_name_ar')->nullable();
            $table->string('second_name_ar')->nullable();
            $table->string('third_name_ar')->nullable();
            $table->string('fourth_name_ar')->nullable();

            $table->string('first_name_en')->nullable();
            $table->string('second_name_en')->nullable();
            $table->string('third_name_en')->nullable();
            $table->string('fourth_name_en')->nullable();
            $table->integer('job_id')->nullable();

            $table->date('birth_date')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->enum('gender', ['MALE', 'FEMALE']);
            $table->string('image')->nullable();
            $table->string('file_name')->nullable();
            $table->string('mother_name_ar', 100)->nullable();
            $table->string('mother_name_en', 100)->nullable();
            $table->enum('marital_status', ['MARRIED', 'SINGLE', 'DIVORCED', 'WIDOWED']);

            $table->string('phone')->nullable();
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
        Schema::dropIfExists('citizens');
    }
}
