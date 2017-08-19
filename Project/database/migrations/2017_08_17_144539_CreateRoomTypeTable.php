<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_room_type', function (Blueprint $table) {
            $table->string('room_type_id',5);
            $table->string('type_name',30)->nullable();
            $table->integer('adult')->nullable();
            $table->integer('children')->nullable();
            $table->string('description',100)->nullable();
            $table->string('image_url',100)->nullable();
            $table->integer('price')->nullable();
            $table->timestamp('create_ymd')->nullable();
            $table->timestamp('update_ymd')->nullable();
            $table->primary('room_type_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_room_type');
    }
}
