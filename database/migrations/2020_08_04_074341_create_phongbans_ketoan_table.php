<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhongbansKetoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phongbans_ketoan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nv_id')->unsigned();
            $table->string('name');
            $table->timestamps();
            $table->foreign('nv_id')->references('id')->on('phongbans')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phongbans_ketoan');
    }
}
