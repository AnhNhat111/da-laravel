<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\LoaiSanPhamController;

Route::group(['prefix' => '/'], function () {

    Route::get('login', [Admin\LoginController::class, 'showLoginForm'])->name('admin.login');

    Route::post('login', [Admin\LoginController::class, 'login'])->name('admin.login.post');

    Route::get('logout', [Admin\LoginController::class, 'logout'])->name('admin.logout');

    Route::get('index', [Admin\LoginController::class, 'index'])->name('admin.index');

    Route::group(['middleware' => ['auth:admin']], function () {

        Route::get('/', function () {
            return view('admin.pages.home');
        })->name('admin.dashboard');

        // Route::group(['prefix' => 'loaisp'], function () {

        //     Route::get('/', [LoaiSanPhamController::class, 'index'])->name('admin.loaisp.index');
        //     Route::get('/create', [LoaiSanPhamController::class, 'create'])->name('admin.loaisp.create');
        //     Route::get('/edit', [LoaiSanPhamController::class, 'edit'])->name('admin.loaisp.edit');
        // });
        Route::resource('loaisp', LoaiSanPhamController::class);
    });
});
