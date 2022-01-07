<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Taikhoan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taikhoan',function (Blueprint $table) {
            $table->Increments('Id');
            $table->string('TENDANGNHAP');
            $table->string('MATKHAU');
            $table->string('TENHIENTHI');
            $table->integer('SODIENTHOAI');
            $table->string('EMAIL');
            $table->integer('TRANGTHAI');
            $table->integer('LOAITK_ID')->unsigned();
            $table->timestamps();

            $table->foreign('LOAITK_ID')->references('Id')->on('loaitaikhoan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taikhoan');
    }
}
