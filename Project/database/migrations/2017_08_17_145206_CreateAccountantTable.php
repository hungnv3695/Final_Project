<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_accountant', function (Blueprint $table) {
            $table->increments('5');
            $table->string('payment_nm',50)->nullable();
            $table->string('payment_ymd',8)->nullable();
            $table->integer('status')->nullable();
            $table->integer('total')->nullable();
            $table->string('receiver_nm',50)->nullable();
            $table->timestamp('create_ymd');
            $table->timestamp('update_ymd');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_accountant');
    }
}
