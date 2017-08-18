<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_reservation_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reservation_id')->nullable();
            $table->string('room_id',5)->nullable();
            $table->string('customer_name',50)->nullable();
            $table->string('date_in',8)->nullable();
            $table->string('date_out',8)->nullable();
            $table->integer('check_in_flag')->default(0)->nullable();
            $table->string('check_out_flag',200)->default(0)->nullable();
            $table->string('note',200)->nullable();
            $table->string('customer_identity_card',12)->nullable();
            $table->string('customer_phone',20)->nullable();
            $table->string('customer_email',50)->nullable();

            $table->timestamp('create_ymd')->nullable();
            $table->timestamp('update_ymd')->nullable();

            $table->foreign('reservation_id')->references('id')->on('tbl_reservation')->onDelete('cascade');
            $table->foreign('room_id')->references('room_id')->on('tbl_room')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_reservation_detail');
    }
}
