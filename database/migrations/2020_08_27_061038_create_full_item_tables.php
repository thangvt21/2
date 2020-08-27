<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFullItemTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('full_item_tables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('ma_ccdc');
            $table->text('model');
            $table->string('loai');
            $table->integer('soluong');
            $table->float('gia')->nullable();
            $table->text('trangthai')->nullable();
            $table->text('baohanh')->nullable();
            $table->text('nhacungcap')->nullable();
            $table->text('tinhtrang')->nullable();
            $table->dateTime('ngaymua');
            $table->dateTime('ngaybangiao');
            $table->text('detail')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('full_item_tables');
    }
}
