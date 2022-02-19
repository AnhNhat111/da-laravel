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
            $table->Increments('id');
            $table->integer('LOAISP_ID')->unsigned()->nullable();
            $table->string('MASP')->nullable();
            $table->string('TENSP')->nullable();
            $table->integer('TRANGTHAI')->nullable();
            $table->string('HINHANH')->nullable();
            $table->string('MOTA')->nullable();
            $table->integer('GIABAN')->nullable();

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
        Schema::dropIfExists('sanpham');
    }
}
