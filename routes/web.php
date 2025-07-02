<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EndeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KitabController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::get('/ende', [EndeController::class, 'index'])->name('index.ende');
Route::get('/alkitab', [KitabController::class, 'index'])->name('index.alkitab');
Route::get('alkitab/search-process', [KitabController::class, 'processSearch'])->name('alkitab.search');