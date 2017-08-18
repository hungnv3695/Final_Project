<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_status', function (Blueprint $table) {
            $table->string('status_id',10);
            $table->string('status_type',2)->nullable();
            $table->string('status_name',50)->nullable();
            $table->string('description',255)->nullable();

            $table->timestamp('create_ymd')->nullable();
            $table->timestamp('update_ymd')->nullable();
            $table->primary('status_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_status');
    }
}
