<?php

use App\Http\Controllers\BlogController;
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
// Magazines
Route::get('/magazines', [MagazineController::class, 'index'])->name('magazines');
Route::get('/magazines/{category}', [MagazineController::class, 'magazinesByCategory'])->name('magazinesByCategory');
Route::get('/magazines/{category}/{subcategory}', [MagazineController::class, 'magazinesBySubcategory'])->name('magazinesBySubcategory');
// News by categories
Route::get('/news', [CategoryNewsController::class, 'index'])->name('news');
Route::get('/news/{category}', [CategoryNewsController::class, 'newsByCategory'])->name('newsByCategory');
// News by countries
Route::get('/countries', [CountryNewsController::class, 'index'])->name('regions');
Route::get('/countries/{region}', [CountryNewsController::class, 'newsByRegion'])->name('newsByRegion');
Route::get('/countries/{region}/{country}', [CountryNewsController::class, 'newsByCountry'])->name('newsByCountry');
// Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
