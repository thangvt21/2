<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhongbansHrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phongbans_hr', function (Blueprint $table) {
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
        Schema::dropIfExists('phongbans_hr');
    }
}
