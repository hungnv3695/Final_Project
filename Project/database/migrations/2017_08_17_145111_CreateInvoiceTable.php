<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_invoice', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('payment_type_id')->nullable();
            $table->integer('reservation_id')->nullable();
            $table->integer('guest_id')->nullable();
            $table->string('tax_code',10)->nullable();
            $table->string('creater_nm',50)->nullable();
            $table->string('updater_nm',50)->nullable();
            $table->timestamp('create_ymd')->nullable();
            $table->timestamp('update_ymd')->nullable();
            $table->foreign('reservation_id')->references('id')->on('tbl_reservation')->onDelete('cascade');
            $table->foreign('payment_type_id')->references('id')->on('tbl_payment_type')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_invoice');
    }
}
