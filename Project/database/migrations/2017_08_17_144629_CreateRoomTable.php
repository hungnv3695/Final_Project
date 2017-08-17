<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_room', function (Blueprint $table) {
            $table->string('room_id',5);
            $table->string('room_type_id',5)->nullable();
            $table->integer('floor')->nullable();
            $table->string('status_id',10)->nullable();
            $table->string('room_number',5)->nullable();
            $table->string('note',100)->nullable();

            $table->timestamp('create_ymd');
            $table->timestamp('update_ymd');
            $table->primary('room_id');
            $table->foreign('room_type_id')->references('room_type_id')->on('tbl_room_type')->onDelete('cascade');
            $table->foreign('status_id')->references('status_id')->on('tbl_status')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_room');
    }
}
