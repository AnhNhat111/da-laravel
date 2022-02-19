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
            $table->integer('TAIKHOAN_ID')->unsigned()->nullable();
            $table->integer('SANPHAM_ID')->unsigned()->nullable();
            // $table->integer('HOADON_ID')->unsigned()->nullable();
            $table->integer('SOLUONG')->nullable();
            $table->double('TONGTIEN')->nullable();
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
