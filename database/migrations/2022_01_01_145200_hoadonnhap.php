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
            $table->id();
            $table->integer('TAIKHOAN_ID');
            $table->integer('SANPHAM_ID');
            $table->date('NGAYNHAP');
            $table->string('NHACUNGCAP');
            $table->integer('TRANGTHAI');
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
        Schema::dropIfExists('hoadonnhap');
    }
}
