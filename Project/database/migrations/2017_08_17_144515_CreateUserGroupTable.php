<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_user_group', function (Blueprint $table) {
            $table->increments('seq_no');
            $table->string('user_id',20)->nullable();
            $table->string('group_cd',7)->nullable();
            $table->string('register_cd',7)->nullable();
            $table->string('register_nm',20)->nullable();
            $table->string('last_register_cd',7)->nullable();
            $table->string('last_register_nm',20)->nullable();

            $table->timestamp('create_ymd')->nullable();
            $table->timestamp('update_ymd')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_user_group');
    }
}
