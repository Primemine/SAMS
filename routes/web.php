<?php

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
    return view('auth/login');
});
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/index', [\App\Http\Controllers\AdminController::class, 'index']);
Route::delete('/home/delete/{id}', [\App\Http\Controllers\HomeController::class, 'delete']);
Route::post('/home/edit/{id}', [\App\Http\Controllers\HomeController::class, 'editRecord']);
Route::get('/home/download',[\App\Http\Controllers\HomeController::class, 'download']);
Route::post('/home/upload', [\App\Http\Controllers\HomeController::class, 'upload']);
Route::get('/home/search', [\App\Http\Controllers\HomeController::class, 'search']);