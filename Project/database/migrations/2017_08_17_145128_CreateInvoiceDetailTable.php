<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_invoice_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoice_id')->nullable();
            $table->string('item_id',5)->nullable();
            $table->string('item_type',50)->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('price')->nullable();
            $table->string('description',100)->nullable();
            $table->integer('amount_total')->nullable();
            $table->string('room_id',5)->nullable();
            $table->string('creater_nm',50)->nullable();
            $table->string('updater_nm',50)->nullable();

            $table->timestamp('create_ymd');
            $table->timestamp('update_ymd');

            $table->foreign('invoice_id')->references('id')->on('tbl_invoice')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_invoice_detail');
    }
}
