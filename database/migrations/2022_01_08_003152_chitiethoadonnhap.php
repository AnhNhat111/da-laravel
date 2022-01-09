<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Chitiethoadonnhap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitiethoadonnhap', function (Blueprint $table) {
            $table->integer('HDNHAP_ID')->unsigned();
            $table->integer('SANPHAM_ID')->unsigned();
            $table->integer('SOLUONG');
            $table->double('GIANHAP');
            $table->timestamps();

            $table->foreign('SANPHAM_ID')->references('id')->on('sanpham');
            $table->foreign('HDNHAP_ID')->references('id')->on('hoadonnhap');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitiethoadonnhap');
    }
}
