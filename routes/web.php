<?php

use App\Http\Controllers\LoaiSanPhamController;
use App\Models\loaisanpham;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Auth;
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

Route::get('/account', function () {
    return View('user.pages.account');
})->name('account');

Route::get('/about', function () {
    return View('user.pages.about');
})->name('about');

Route::get('/contact', function () {
    return View('user.pages.contact');
})->name('contact');

Route::get('/signin', function () {
    return View('user.pages.signin');
})->name('signin');

Route::get('/signup', function () {
    return View('user.pages.signup');
})->name('signup');

Route::get('/Dangnhap', function () {
    return view('admin.pages.Dangnhap');
})->name('Dangnhap');

Route::get('/homeadmin', function () {
    return view('admin.pages.home');
})->name('homeadmin');

Route::get('/QLtaikhoan', function () {
    return view('admin.pages.QLtaikhoan');
})->name('QLtaikhoan');


Route::get('/QLsanpham', function () {
    return view('admin.pages.QLsanpham');
})->name('QLsanpham');

Route::get('/QLhoadonnhap', function () {
    return view('admin.pages.QLhoadonnhap');
})->name('QLhoadonnhap');

Route::get('/QLhoadonban', function () {
    return view('admin.pages.QLhoadonban');
})->name('QLhoadonban');

Route::get('/QLloaiSP', function () {
    return view('admin.pages.QLloaiSP');
})->name('QLloaiSP');

Route::get('/Themsanpham', function () {
    return view('admin.pages.Themsanpham');
})->name('Themsanpham');

Route::get('/Dangky', function () {
    return view('admin.pages.Dangky');
})->name('Dangky');

Route::resource('loaisp', LoaiSanPhamController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
