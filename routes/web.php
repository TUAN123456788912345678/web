<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
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
//index
Route::get('/', [IndexController::class,'home'])->name('home');
Route::get('/dich-vu', [IndexController::class,'services'])->name('services'); //tất cả phu thuoc vao game
Route::get('/sub_services', [IndexController::class,'sub_services'])->name('sub_services'); //dịch vụ conv thuộc địch vụ
Route::get('/danh-muc', [IndexController::class,'category'])->name('category');//tât ca danh muc game
Route::get('/sub_category', [IndexController::class,'sub_category'])->name('sub_category');//tât ca danh muc game
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
//category
Route::resource('/category', CategoryController::class);
//Slider
Route::resource('/slider', SliderController::class);

//user
Route::get('/home-user', [App\Http\Controllers\UserController::class,'index'])->name('user.index'); 

Route::get('/add-user', [App\Http\Controllers\UserController::class,'create'])->name('create'); 

Route::post('/store-user',[App\Http\Controllers\UserController::class,'store'])->name('store');

Route::get('/edit-user/{id}', [App\Http\Controllers\UserController::class,'edit'])->name('edit');

Route::put('/update-user/{id}', [App\Http\Controllers\UserController::class,'update'])->name('update');

Route::get('/destroy-user/{user}', [App\Http\Controllers\UserController::class,'destroy'])->name('destroy'); 



