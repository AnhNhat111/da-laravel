<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Giohang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giohang', function (Blueprint $table) {
            $table->integer('TAIKHOAN_ID')->unsigned();
            $table->integer('SANPHAM_ID')->unsigned();
            $table->integer('HOADON_ID')->unsigned();
            $table->integer('SOLUONG');
            $table->double('TONGTIEN');
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
        Schema::dropIfExists('giohang');
    }
}
