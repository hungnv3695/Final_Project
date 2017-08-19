<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_guest', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50)->nullable();
            $table->string('phone',20)->nullable();
            $table->string('mail',50)->nullable();
            $table->string('identity_card',12)->nullable();
            $table->string('company',50)->nullable();
            $table->string('address',100)->nullable();
            $table->string('company_phone',20)->nullable();
            $table->string('country',50)->nullable();

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
        Schema::dropIfExists('tbl_guest');
    }
}
