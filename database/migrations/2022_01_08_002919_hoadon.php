<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Hoadon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadon', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('TAIKHOAN_ID')->unsigned()->nullable();
            $table->string('DIACHI')->nullable();
            $table->string('GHICHU')->nullable();
            $table->double('TONGTIEN')->nullable();
            $table->integer('TRANGTHAI')->nullable();
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
        Schema::dropIfExists('hoadon');
    }
}
