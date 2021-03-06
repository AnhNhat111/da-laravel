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
            $table->Increments('id');
            $table->string('password');
            $table->string('TENHIENTHI');
            $table->string('SODIENTHOAI');
            $table->string('email');
            $table->integer('TRANGTHAI');
            $table->string('DIACHI');
            $table->string('ANH');
            $table->integer('LOAITK_ID')->unsigned();
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
        Schema::dropIfExists('taikhoan');
    }
}
