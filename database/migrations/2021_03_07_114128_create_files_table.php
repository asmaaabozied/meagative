<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('module_name')->nullable();
            $table->string('table_name')->nullable();
            $table->string('table_id')->nullable();
            $table->string('field_name')->nullable();
            $table->string('file_name')->nullable();
            $table->string('file_title_ar')->nullable();
            $table->string('file_title_en')->nullable();
            $table->string('encrypt_name')->nullable();
            $table->string('type')->nullable();
            $table->string('extention')->nullable();

            $table->string('dimension')->nullable();
            $table->string('size')->nullable();
            $table->string('is_image')->nullable();
            $table->string('is_min')->nullable();
            $table->string('path_id')->nullable();
            $table->string('path')->nullable();
            $table->string('type')->nullable();
            $table->string('uploaded_date')->nullable();
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
        Schema::dropIfExists('files');
    }
}
