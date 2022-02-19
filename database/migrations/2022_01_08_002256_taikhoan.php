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
        Schema::create('taikhoan', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('password');
            $table->string('TENHIENTHI')->nullable();
            $table->string('SODIENTHOAI')->nullable();
            $table->string('email')->nullable();
            $table->integer('TRANGTHAI')->nullable();
            $table->string('DIACHI')->nullable();
            $table->string('ANH')->nullable();
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
