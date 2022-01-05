<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;


Route::group(['prefix' => '/'], function () {

        Route::get('login', [Admin\LoginController::class, 'showLoginForm'])->name('admin.login');

        Route::post('login', [Admin\LoginController::class, 'login'])->name('admin.login.post');

        Route::get('logout', [Admin\LoginController::class, 'logout'])->name('admin.logout');

        Route::get('index', [Admin\LoginController::class, 'index'])->name('admin.index');
        
        Route::group(['middleware' => ['auth:admin']], function () {
            Route::get('/', function () {
                return view('admin.pages.home');
            })->name('admin.dashboard');
        });
});