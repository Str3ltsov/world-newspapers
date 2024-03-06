<?php

use App\Http\Controllers\CategoryNewsController;
use App\Http\Controllers\CountryNewsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MagazineController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');
// News by categories
Route::get('/news', [CategoryNewsController::class, 'index'])->name('news');
Route::get('/news/{category}', [CategoryNewsController::class, 'show'])->name('newsByCategory');
// Magazines
Route::get('/magazines', [MagazineController::class, 'index'])->name('magazines');
Route::get('/magazines/{category}', [MagazineController::class, 'magazinesByCategory'])->name('magazinesByCategory');
Route::get('/magazines/{category}/{subcategory}', [MagazineController::class, 'magazinesBySubcategory'])->name('magazinesBySubcategory');
// News by countries
Route::get('/countries', [CountryNewsController::class, 'index'])->name('countries');
