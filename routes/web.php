<?php

use App\Http\Controllers\BukuController;
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

//crud mahasiswa
Route::get('/admMhsIndex', [MahasiswaController::class, 'index'])->name('admMhsIndex')->middleware('auth');
Route::get('/mhsCreate', [MahasiswaController::class, 'create'])->name('mhsCreate')->middleware('auth');
Route::post('/storeMhs', [MahasiswaController::class, 'store'])->name('storeMhs')->middleware('auth');
Route::get('/showMhs/{id}', [MahasiswaController::class, 'show'])->name('showMhs')->middleware('auth');
Route::post('/updateMhs/{id}', [MahasiswaController::class, 'update'])->name('updateMhs')->middleware('auth');
Route::get('/deleteMhs/{id}', [MahasiswaController::class, 'destroy'])->name('deleteMhs')->middleware('auth');

//crud buku
Route::get('/admBukuIndex', [BukuController::class, 'index'])->name('admBukuIndex')->middleware('auth');
Route::get('/bukuCreate', [BukuController::class, 'create'])->name('bukuCreate')->middleware('auth');
Route::post('/storeBuku', [BukuController::class, 'store'])->name('storeBuku')->middleware('auth');
Route::get('/showBuku/{id}', [BukuController::class, 'show'])->name('showBuku')->middleware('auth');
Route::post('/updateBuku/{id}', [BukuController::class, 'update'])->name('updateBuku')->middleware('auth');
Route::get('/deleteBuku/{id}', [BukuController::class, 'destroy'])->name('deleteBuku')->middleware('auth');

//login & register
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginCheck', [LoginController::class, 'loginCheck'])->name('loginCheck');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registerStore', [LoginController::class, 'registerStore'])->name('registerStore');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
