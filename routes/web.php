<?php

use Facade\FlareClient\View;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});
Route::get('/index', function () {
    return View('user.pages.index');
})->name('index');

Route::get('/cart', function () {
    return View('user.pages.cart');
})->name('cart');

Route::get('/product', function () {
    return View('user.pages.product');
})->name('product');

Route::get('/product-detail', function () {
    return View('user.pages.product-detail');
})->name('product-detail');

Route::get('/checkout', function () {
    return View('user.pages.checkout');
})->name('checkout');

Route::get('/signin', function () {
    return View('user.auth.signin');
})->name('signin');

Route::get('/signup', function () {
    return View('user.auth.signup');
})->name('signup');
