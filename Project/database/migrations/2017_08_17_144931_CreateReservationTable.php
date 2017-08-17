<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_reservation', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status_id',10)->nullable();
            $table->integer('guest_id')->nullable();
            $table->string('check_in',8)->nullable();
            $table->string('check_out',8)->nullable();
            $table->integer('number_of_room')->nullable();
            $table->integer('number_of_adult')->nullable();
            $table->integer('number_of_children')->nullable();
            $table->string('note',200)->nullable();
            $table->string('editer',50)->nullable();

            $table->timestamp('create_ymd');
            $table->timestamp('update_ymd');

            $table->foreign('status_id')->references('status_id')->on('tbl_status')->onDelete('cascade');
            $table->foreign('guest_id')->references('id')->on('tbl_guest')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_reservation');
    }
}
