<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietsanphamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietsanphams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('SANPHAM_ID')->unsigned();
            $table->string('MASP');
            $table->integer('GIABAN');
            $table->string('COLOR');
            $table->string('SIZE');
            $table->timestamps();

            //$table->foreign('SANPHAM_ID')->references('id')->on('sanpham');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitietsanphams');
    }
}
