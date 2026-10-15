<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaludoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/saludo', [SaludoController::class, 'saludo']);

Route::middleware('guest')->group(function () {
    Route::get('/registro', [RegisterController::class, 'create'])->name('register');
    Route::post('/registro', [RegisterController::class, 'store'])->name('register.store');
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.authenticate');
});

Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/perfil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/perfil', [ProfileController::class, 'update'])->name('profile.update');
});

Route::view('/sira', 'sira.dashboard')->name('sira.dashboard');
Route::view('/sistema', 'sira.system')->name('sira.system');
Route::view('/manifiestos', 'sira.manifests')->name('sira.manifests');
Route::view('/documentos', 'sira.documents')->name('sira.documents');
Route::view('/trazabilidad', 'sira.custody')->name('sira.custody');