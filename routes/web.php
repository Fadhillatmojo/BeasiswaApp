<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeasiswaController;

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

Route::get('/', function () {
    return redirect("/beasiswa/pilihan");
});

Route::get('/beasiswa/pilihan', [BeasiswaController::class, 'pilihan'])->name('beasiswa.pilihan');
Route::get('/beasiswa', [BeasiswaController::class, 'index'])->name('beasiswa.index');
Route::post('/beasiswa/daftar', [BeasiswaController::class, 'daftar'])->name('beasiswa.daftar');
Route::get('/beasiswa/hasil', [BeasiswaController::class, 'hasil'])->name('beasiswa.hasil');
