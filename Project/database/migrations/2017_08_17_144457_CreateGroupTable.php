<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_group', function (Blueprint $table) {
            $table->string('group_cd',7);
            $table->string('group_name',50)->nullable();
            $table->string('register_cd',7)->nullable();
            $table->string('register_nm',20)->nullable();
            $table->string('last_register_cd',7)->nullable();
            $table->string('last_register_nm',20)->nullable();
            $table->timestamp('create_ymd');
            $table->timestamp('update_ymd');
            $table->primary('group_cd');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_group');
    }
}
