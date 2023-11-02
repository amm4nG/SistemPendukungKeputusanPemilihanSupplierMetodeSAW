<?php

use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\NilaiKriteriaController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\HasilController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Route::get('login', function () {
    return view('login');
})
    ->name('login')
    ->middleware('guest');

Route::post('proses/login', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::resource('home', HomeController::class);
    Route::resource('barang', BarangController::class);
    Route::resource('supplier', SupplierController::class);
    Route::resource('kriteria', KriteriaController::class);
    Route::resource('sub-kriteria', NilaiKriteriaController::class);
    Route::resource('penilaian', PenilaianController::class);
    Route::resource('hasil', HasilController::class);
});
