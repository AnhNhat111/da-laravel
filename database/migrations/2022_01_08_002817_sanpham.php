<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sanpham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->Increments('Id');
            $table->integer('LOAISP_ID')->unsigned();
            $table->string('TENSP');
            $table->integer('TRANGTHAI');
            $table->string('HINHANH');
            $table->string('MOTA');
            $table->integer('GIABAN');
            $table->integer('SLTK');
            $table->string('COLOR');
            $table->string('SIZE');
            $table->timestamps();

            $table->foreign('LOAISP_ID')->references('Id')->on('loaisanpham');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanpham');
    }
}
