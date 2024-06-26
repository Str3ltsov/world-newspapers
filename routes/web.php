<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryNewsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CountryNewsController;
use App\Http\Controllers\CustomPageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MagazineController;
use App\Http\Controllers\SitemapController;
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

Auth::routes(['register' => 'false']);

Route::get('logout', function () {
    Auth::logout();
    return back()->with('success', __('Successfully logged out'));
})->name('logout');

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('adminDashboard');
    Route::resource('magazines', Admin\MagazineController::class);
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', fn () => redirect()->route('home'));

Route::prefix('magazines')->group(function () {
    Route::get('/', [MagazineController::class, 'index'])->name('magazines');
    Route::get('/{category}', [MagazineController::class, 'magazinesByCategory'])->name('magazinesByCategory');
    Route::get('/{category}/{subcategory}', [MagazineController::class, 'magazinesBySubcategory'])->name('magazinesBySubcategory');
});

Route::prefix('news')->group(function () {
    Route::get('/', [CategoryNewsController::class, 'index'])->name('news');
    Route::get('/{category}', [CategoryNewsController::class, 'newsByCategory'])->name('newsByCategory');
});

Route::prefix('countries')->group(function () {
    Route::get('/', [CountryNewsController::class, 'index'])->name('regions');
    Route::get('/{region}', [CountryNewsController::class, 'newsByRegion'])->name('newsByRegion');
    Route::get('/{region}/{country}', [CountryNewsController::class, 'newsByCountry'])->name('newsByCountry');
    Route::get('/{region}/{country}/{state}', [CountryNewsController::class, 'newsByState'])->name('newsByState');
    Route::get('/{region}/{country}/{innerCountry}/{state}', [CountryNewsController::class, 'newsByInnerCountryState'])->name('newsByInnerCountryState');
});

Route::prefix('blogs')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('blogs');
    Route::get('/{title}', [BlogController::class, 'show'])->name('blog');
});

Route::prefix('contact')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('contact');
    Route::post('/', [ContactController::class, 'sendMessage'])->name('sendMessage');
});

Route::get('/sitemap-index', [SitemapController::class, 'index'])->name('sitemap');

// Custom pages (about us, privacy policy)
Route::get('/{page}', [CustomPageController::class, 'index'])->name('customPage');
