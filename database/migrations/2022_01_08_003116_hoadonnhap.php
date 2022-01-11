<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Hoadonnhap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadonnhap', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('TAIKHOAN_ID')->unsigned();
            $table->integer('SANPHAM_ID')->unsigned();
            $table->date('NGAYNHAP');
            $table->string('NHACUNGCAP');
            $table->integer('TRANGTHAI');
            $table->double('TONGTIEN');
            $table->timestamps();

            $table->foreign('SANPHAM_ID')->references('id')->on('sanpham');
            $table->foreign('TAIKHOAN_ID')->references('id')->on('taikhoan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hoadonnhap');
    }
}
