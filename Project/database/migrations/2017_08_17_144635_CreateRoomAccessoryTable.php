<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomAccessoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_room_accessory', function (Blueprint $table) {
            $table->increments('id');
            $table->string('room_type_id',5)->nullable();
            $table->string('accessory_name',20)->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('price')->nullable();
            $table->string('description',100)->nullable();

            $table->timestamp('create_ymd')->nullable();
            $table->timestamp('update_ymd')->nullable();

            $table->foreign('room_type_id')->references('room_type_id')->on('tbl_room_type')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_room_accessory');
    }
}
