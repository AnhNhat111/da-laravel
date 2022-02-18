<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\SigUpController;

Route::group(['prefix' => '/'], function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('user.login');
    Route::post('login', [LoginController::class, 'login'])->name('user.login.post');
    Route::get('logout', [LoginController::class, 'logout'])->name('user.logout');

    Route::get('index', [LoginController::class, 'index'])->name('user.index');
    Route::get('signup', [SigUpController::class, 'showSigupForm'])->name('user.signup');
    Route::post('signup', [SigUpController::class, 'signup'])->name('user.signup.post');

    Route::get('/', function () {
        return view('user.pages.index');
    });
});
