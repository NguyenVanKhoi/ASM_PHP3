<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProductController::class, 'home'])->name('user.home');
Route::get('register', function () {
    return view('admin.register');
})->name('register');
Route::get('forgotPassword', function () {
    return view('admin.forgot-password');
})->name('forgotPassword');
Route::get('/user/category/{id}', [ProductController::class, 'categoryProduct'])->name('user.category');
Route::get('/user/product/{id}', [ProductController::class, 'detailProduct'])->name('user.detail');
