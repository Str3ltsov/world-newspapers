<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryNewsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CountryNewsController;
use App\Http\Controllers\CustomPageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MagazineController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
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

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
// Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
// Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');


Route::prefix('admin')->group(function () {
	Route::get('login', [LoginController::class, 'showLoginForm'])->name('admin.login');
	Route::post('login', [LoginController::class, 'login']);
	Route::post('logout', [LoginController::class, 'logout'])->name('admin.logout');

	Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
	});
});








Auth::routes(['verify' => true]);


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
Route::get('/countries/{region}/{country}/{state}', [CountryNewsController::class, 'newsByState'])->name('newsByState');
Route::get('/countries/{region}/{country}/{innerCountry}/{state}', [CountryNewsController::class, 'newsByInnerCountryState'])->name('newsByInnerCountryState');
// Blogs
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
Route::get('/blogs/{title}', [BlogController::class, 'show'])->name('blog');
// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'sendMessage'])->name('sendMessage');
// Sitemap
Route::get('/sitemap-index', [SitemapController::class, 'index'])->name('sitemap');

// Custom pages (about us, privacy policy)
Route::get('/{page}', [CustomPageController::class, 'index'])->name('customPage');



