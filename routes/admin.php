<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\GioHangController;
use App\Http\Controllers\Admin\HoaDonBanController;
use App\Http\Controllers\Admin\LoaiSanPhamController;
use App\Http\Controllers\Admin\LoaiTaiKhoanController;
use App\Http\Controllers\Admin\ql_ctspController;
use App\Http\Controllers\Admin\QuanLyTaiKhoanController;
use App\Http\Controllers\Admin\SanPhamController;

Route::group(['prefix' => '/'], function () {

    Route::get('login', [Admin\LoginController::class, 'showLoginForm'])->name('admin.login');

    Route::post('login', [Admin\LoginController::class, 'login'])->name('admin.login.post');

    Route::get('logout', [Admin\LoginController::class, 'logout'])->name('admin.logout');

    Route::get('index', [Admin\LoginController::class, 'index'])->name('admin.index');



    Route::group(['middleware' => ['auth:admin']], function () {

        Route::get('/', function () {
            return view('admin.pages.login.home');
        })->name('admin.dashboard');

        Route::resource('loaisp', LoaiSanPhamController::class);
        Route::resource('loaitaikhoan', LoaiTaiKhoanController::class);
        Route::resource('quan-ly-tai-khoan', QuanLyTaiKhoanController::class);
        Route::resource('QLsanpham', SanPhamController::class);
        Route::resource('chi-tiet-san-pham', ql_ctspController::class);
        Route::resource('giohang', GioHangController::class);
        Route::resource('hoadonban', HoaDonBanController::class);
    });
    // Route::get('QLsanpham',[SanPhamController::class,'index'])->name('QLsanpham');


    // Route::get('Themsanpham', [SanPhamController::class,'create'])->name('Themsanpham');
});
