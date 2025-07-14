<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EndeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IbadahController;
use App\Http\Controllers\KitabController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home/ende/{nomorLagu}', [EndeController::class, 'showEnde'])->name('home.showEnde');
// Route::get('/home/alkitab/{kitab}/{pasal}', [HomeController::class, 'showChapter'])->name('home.showChapter');
Route::get('/ende', [EndeController::class, 'index'])->name('index.ende');
Route::get('/ende/search-process', [EndeController::class, 'search'])->name('ende.search');
Route::get('/alkitab', [KitabController::class, 'index'])->name('index.alkitab');
Route::get('alkitab/search-process', [KitabController::class, 'processSearch'])->name('alkitab.search');

// Routes untuk Manajemen Ibadah menggunakan Resource Controller
Route::resource('ibadah', IbadahController::class)->except(['show', 'create', 'edit']);
Route::get('/ibadah/{ibadah}', [IbadahController::class, 'show'])->name('ibadah.show');

Route::get('/home/ibadah', [IbadahController::class, 'index'])->name('ibadah.index');

Route::get('/alkitab-home/search', [HomeController::class, 'alkitabSearch'])->name('alkitab-home.search');
Route::get('/ende-home/search', [HomeController::class, 'endeSearch'])->name('ende-home.search');