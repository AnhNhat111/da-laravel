<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\LoginController;
use App\Models\User;

Route::group(['prefix' => '/'], function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('user.login');
    Route::post('login', [LoginController::class, 'login'])->name('user.login.post');
    Route::get('logout', [LoginController::class, 'logout'])->name('user.logout');

    Route::get('/', function () {
    return view('user.pages.index');
});
});