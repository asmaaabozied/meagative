<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsSidemenuItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions_sidemenu_items', function (Blueprint $table) {
            $table->unsignedInteger('permission_id');
            $table->unsignedBigInteger('sidemenu_item_id');

            $table->foreign('permission_id')
                ->references('id')
                ->on('permissions')
                ->onDelete('cascade');

            $table->foreign('sidemenu_item_id')
                ->references('id')
                ->on('sidemenu_items')
                ->onDelete('cascade');

            $table->primary(['permission_id', 'sidemenu_item_id'], 'permissions_sidemenu_items_primary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions_sidemenu_items');
    }
}
