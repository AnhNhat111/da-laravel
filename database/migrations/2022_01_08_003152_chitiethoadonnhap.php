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
            $table->integer('HDNHAP_ID')->unsigned()->nullable();
            $table->integer('SANPHAM_ID')->unsigned()->nullable();
            $table->integer('SOLUONG')->nullable();
            $table->double('GIANHAP')->nullable();
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
        Schema::dropIfExists('chitiethoadonnhap');
    }
}
