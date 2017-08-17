<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_user', function (Blueprint $table) {
            $table->string('user_id',20);
            $table->string('user_name',50)->nullable();
            $table->string('login_pwd',8)->nullable();
            $table->string('pwd_regs_ymd',8)->nullable();
            $table->string('acc_lock_flg',1)->nullable();
            $table->string('delete_flg',1)->nullable();
            $table->string('phone',20)->nullable();
            $table->string('mail',50)->nullable();
            $table->string('identity_card',12)->nullable();
            $table->string('tax_code',20)->nullable();
            $table->string('identity_card_location',100)->nullable();
            $table->string('address',100)->nullable();
            $table->string('register_cd',7)->nullable();
            $table->string('register_nm',20)->nullable();
            $table->string('last_register_cd',7)->nullable();
            $table->string('last_register_nm',20)->nullable();
            $table->timestamp('create_ymd');
            $table->timestamp('update_ymd');
            $table->primary('user_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_user');
    }
}
