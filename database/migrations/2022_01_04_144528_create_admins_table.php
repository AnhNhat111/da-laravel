<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('password');
            $table->string('TENHIENTHI');
            $table->integer('SODIENTHOAI');
            $table->string('email');    
            $table->integer('TRANGTHAI');
            $table->string('DIACHI');
            $table->integer('LOAITK_ID')->unsigned();
            $table->timestamps();

            $table->foreign('LOAITK_ID')->references('id')->on('loaitaikhoan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
    }
}
