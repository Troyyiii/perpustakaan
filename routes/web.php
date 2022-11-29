<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PinjamController;
use Database\Seeders\BukuSeeder;

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

Auth::routes();

Route::get('/e-library', function () {
    return view('welcome');
})->name('e-library');

//login & register
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginCheck', [LoginController::class, 'loginCheck'])->name('loginCheck');
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/registerStore', [RegisterController::class, 'registerStore'])->name('registerStore');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// user
Route::middleware(['auth', 'user-access:user'])->group(function(){

    // indexuser
    Route::get('/usrIndex', function () {
        return view('user\usrIndex');
    })->name('usrIndex')->middleware('auth');

    Route::get('/usrBukuIndex', [BukuController::class, 'index'])->name('usrBukuIndex')->middleware('auth');
    Route::get('/usrBukuIndex/cari', [BukuController::class, 'search'])->name('usrBukuIndexCari')->middleware('auth');
    Route::get('/usrBukuInfo/{id}', [BukuController::class, 'show'])->name('usrBukuInfo')->middleware('auth');
    Route::get('/usrPinjamIndex', [PinjamController::class, 'indexUser'])->name('usrPinjamIndex')->middleware('auth');
    Route::post('/usrPinjam/{id}', [PinjamController::class, 'pinjam'])->name('usrPinjam')->middleware('auth');
});

// admin
Route::middleware(['auth', 'user-access:admin'])->group(function(){

    //indexadmin
    Route::get('/admIndex', [AdminController::class, 'index'])->name('admIndex')->middleware('auth');

    // profile
    Route::get('/admProfile/{id}', [AdminController::class, 'showProfile'])->name('admProfile')->middleware('auth');

    //crud mahasiswa
    Route::get('/admMhsIndex', [MahasiswaController::class, 'index'])->name('admMhsIndex')->middleware('auth');
    Route::get('/mhsCreate', [MahasiswaController::class, 'create'])->name('mhsCreate')->middleware('auth');
    Route::post('/storeMhs', [MahasiswaController::class, 'store'])->name('storeMhs')->middleware('auth');
    Route::get('/showMhs/{id}', [MahasiswaController::class, 'show'])->name('showMhs')->middleware('auth');
    Route::post('/updateMhs/{id}', [MahasiswaController::class, 'update'])->name('updateMhs')->middleware('auth');
    Route::get('/deleteMhs/{id}', [MahasiswaController::class, 'destroy'])->name('deleteMhs')->middleware('auth');
    Route::get('/verifyMhs/{id}', [AdminController::class, 'verify'])->name('verifyMhs')->middleware('auth');

    //crud buku
    Route::get('/admBukuIndex', [BukuController::class, 'index'])->name('admBukuIndex')->middleware('auth');
    Route::get('/bukuCreate', [BukuController::class, 'create'])->name('bukuCreate')->middleware('auth');
    Route::post('/storeBuku', [BukuController::class, 'store'])->name('storeBuku')->middleware('auth');
    Route::get('/showBuku/{id}', [BukuController::class, 'show'])->name('showBuku')->middleware('auth');
    Route::post('/updateBuku/{id}', [BukuController::class, 'update'])->name('updateBuku')->middleware('auth');
    Route::get('/deleteBuku/{id}', [BukuController::class, 'destroy'])->name('deleteBuku')->middleware('auth');
    Route::get('/admBukuIndex/cari', [BukuController::class, 'search'])->name('admBukuIndexCari')->middleware('auth');

    // peminjaman
    Route::get('/verifyPjm/{id}', [AdminController::class, 'verifyPjm'])->name('verifyPjm')->middleware('auth');
    Route::get('/admPinjamIndex', [PinjamController::class, 'indexAdmin'])->name('admPinjamIndex')->middleware('auth');
    Route::get('/admPinjamInfo/{id}', [PinjamController::class, 'show'])->name('admPinjamInfo')->middleware('auth');
    Route::post('/admPjmKembali/{id}', [PinjamController::class, 'kembali'])->name('admPjmKembali')->middleware('auth');
});
