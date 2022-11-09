<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

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

//crud
Route::get('/index', [MahasiswaController::class, 'index'])->name('index')->middleware('auth');
Route::get('/create', [MahasiswaController::class, 'create'])->name('create')->middleware('auth');
Route::post('/store', [MahasiswaController::class, 'store'])->name('store')->middleware('auth');
Route::get('/show/{id}', [MahasiswaController::class, 'show'])->name('show')->middleware('auth');
Route::post('/update/{id}', [MahasiswaController::class, 'update'])->name('update')->middleware('auth');
Route::get('/delete/{id}', [MahasiswaController::class, 'destroy'])->name('delete')->middleware('auth');

//login & register
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logincheck', [LoginController::class, 'logincheck'])->name('logincheck');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registerstore', [LoginController::class, 'registerstore'])->name('registerstore');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
