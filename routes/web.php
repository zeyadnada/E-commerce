<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
    return redirect()->route('login');
});
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::group(['prefix' => 'shop', 'middleware' => ['user', 'auth'], 'as' => 'shop.'], function () {
    Route::get('/', [ShopController::class, 'index'])->name('index');
    Route::get('/show/{id}', [ShopController::class, 'show'])->name('show');
    Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
        Route::get('/show/{id}', [ShopController::class, 'showProduct'])->name('show');
    });
});




Route::resource('cart', CartController::class)->only(['index', 'show', 'destroy'])->middleware(['user', 'auth']);
Route::post('/checkout{total}', [CartController::class, 'checkout'])->middleware(['auth', 'user'])->name('cart.checkout');
Route::post('/store/{id}', [CartController::class, 'addToCart'])->middleware(['auth', 'user'])->name('addToCart');
///////
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(['admin', 'auth']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('main')->middleware('user');
Route::resource('products', ProductController::class)->middleware(['auth', 'admin']);
Route::resource('categories', CategoryController::class)->middleware(['auth', 'admin']);
Route::resource('user', UserController::class)->only(['index', 'update', 'destroy', 'show'])->middleware(['auth', 'admin']);
Route::resource('profile', ProfileController::class)->except(['create', 'store', 'show'])->middleware('auth');
Route::get('/search', SearchController::class)->name('search')->middleware('auth');


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Auth::routes();