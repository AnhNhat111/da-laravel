<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\LoginController;
<<<<<<< HEAD
use App\Models\User;
use App\Http\Controllers\User\SanPhamController;
=======
use App\Http\Controllers\User\SigUpController;
>>>>>>> 79cba21762eceaf8a30f1cb94ea1080ef6e0eaa5

Route::group(['prefix' => '/'], function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('user.login');
    Route::post('login', [LoginController::class, 'login'])->name('user.login.post');
    Route::get('logout', [LoginController::class, 'logout'])->name('user.logout');
<<<<<<< HEAD
    Route::get('detail/{id}', [SanPhamController::class,'show'])->name('user.detail');
    Route::get('/', [SanPhamController::class,'index'])->name('user.pages.index');
=======

    Route::get('index', [LoginController::class, 'index'])->name('user.index');
    Route::get('signup', [SigUpController::class, 'showSigupForm'])->name('user.signup');
    Route::post('signup', [SigUpController::class, 'signup'])->name('user.signup.post');

    Route::get('/', function () {
        return view('user.pages.index');
    });
>>>>>>> 79cba21762eceaf8a30f1cb94ea1080ef6e0eaa5
});
