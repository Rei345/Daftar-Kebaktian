<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EndeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KitabController;
use App\Http\Controllers\IbadahController;

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

// Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Ende (Hymn Book) Routes
Route::get('/ende', [EndeController::class, 'index'])->name('index.ende');
Route::get('/ende/search-process', [EndeController::class, 'search'])->name('ende.search');

// Alkitab (Bible) Routes
Route::get('/alkitab', [KitabController::class, 'index'])->name('index.alkitab');
Route::get('/alkitab/search-process', [KitabController::class, 'processSearch'])->name('alkitab.search');

// Manajemen Ibadah Routes
Route::get('/ibadah', [IbadahController::class, 'index'])->name('ibadah.index');
Route::resource('ibadah', IbadahController::class)->except(['index', 'create', 'edit', 'show'])->middleware('auth');

// Ibadah (Worship) Routes
Route::get('/ibadah/{ibadah}', [IbadahController::class, 'show'])->name('ibadah.show');

// Alkitab and Ende Home Search Routes
Route::get('/alkitab-home/search', [HomeController::class, 'alkitabSearch'])->name('alkitab-home.search');
Route::get('/ende-home/search', [HomeController::class, 'endeSearch'])->name('ende-home.search');

// Login Route
Route::get('/login', [UserController::class, 'index'])->name('index.login');
Route::post('/login/process', [UserController::class, 'processLogin'])->name('login.process');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');