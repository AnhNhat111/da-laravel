<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\LoginController;

Route::group(['prefix' => '/'], function () {

        Route::get('login', [LoginController::class, 'showLoginForm'])->name('admin.login');

        Route::post('login', [LoginController::class, 'login'])->name('admin.login.post');
        
        Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');

        Route::get('index', [LoginController::class, 'index'])->name('admin.pages.home');

    Route::get('/', function () {
        return view('admin.pages.Dangnhap');
    });
});