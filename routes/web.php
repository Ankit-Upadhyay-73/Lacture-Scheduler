<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LacturerController;
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


Route::view('/','home');

Route::view('/admin','adminhome');

Route::post('/lacturer/login',[LacturerController::class,'login']);

Route::post('/admin/login',[AdminController::class,'login']);

Route::post('/admin/addCourse',[AdminController::class,'addCourse']);

Route::view('/admin/course','admin.addCourse');

Route::view('/admin/lacturer','admin.addLacturer');

Route::get('/admin/lacture',[AdminController::class,'lacture']);

Route::post('/admin/addLacture',[AdminController::class,'addLacture']);

Route::post('/admin/addLacturer',[AdminController::class,'addLacturer']);

Route::get('/lacturer/showLactures/{email}',[LacturerController::class,'showLacture']);
