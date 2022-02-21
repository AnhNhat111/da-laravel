<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Constraint extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admin', function (Blueprint $table) {
            $table->foreign('LOAITK_ID')->references('id')->on('loaitaikhoan');
        });
        Schema::table('taikhoan', function (Blueprint $table) {
            $table->foreign('LOAITK_ID')->references('id')->on('loaitaikhoan');
        });
        Schema::table('sanpham', function (Blueprint $table) {
            $table->foreign('LOAISP_ID')->references('id')->on('loaisanpham');
        });
        Schema::table('hoadon', function (Blueprint $table) {
            $table->foreign('TAIKHOAN_ID')->references('id')->on('taikhoan');
        });
        Schema::table('hoadonnhap', function (Blueprint $table) {
            $table->foreign('SANPHAM_ID')->references('id')->on('sanpham');
            $table->foreign('TAIKHOAN_ID')->references('id')->on('admin');
        });
        Schema::table('chitiethoadonnhap', function (Blueprint $table) {
            $table->foreign('SANPHAM_ID')->references('id')->on('sanpham');
            $table->foreign('HDNHAP_ID')->references('id')->on('hoadonnhap');
        });
        Schema::table('giohang', function (Blueprint $table) {
            $table->foreign('TAIKHOAN_ID')->references('id')->on('taikhoan');
            $table->foreign('SANPHAM_ID')->references('id')->on('sanpham');
            $table->foreign('HOADON_ID')->references('id')->on('hoadon');
        });
        Schema::table('chitietsanpham', function (Blueprint $table) {
            $table->foreign('SANPHAM_ID')->references('id')->on('sanpham');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admin', function (Blueprint $table) {
            $table->dropForeign(['LOAITK_ID']);
        });
        Schema::table('taikhoan', function (Blueprint $table) {
            $table->dropForeign(['LOAITK_ID']);
        });
        Schema::table('sanpham', function (Blueprint $table) {
            $table->dropForeign(['LOAISP_ID']);
        });
        Schema::table('hoadon', function (Blueprint $table) {
            $table->dropForeign(['TAIKHOAN_ID']);
        });
        Schema::table('hoadonnhap', function (Blueprint $table) {
            $table->dropForeign(['SANPHAM_ID']);
            $table->dropForeign(['TAIKHOAN_ID']);
        });
        Schema::table('chitiethoadonnhap', function (Blueprint $table) {
            $table->dropForeign(['SANPHAM_ID']);
            $table->dropForeign(['HDNHAP_ID']);
        });
        Schema::table('giohang', function (Blueprint $table) {
            $table->dropForeign(['TAIKHOAN_ID']);
            $table->dropForeign(['SANPHAM_ID']);
            $table->dropForeign(['HOADON_ID']);
        });
        Schema::table('chitietsanpham', function (Blueprint $table) {
            $table->dropForeign(['SANPHAM_ID']);
        });
    }
}
