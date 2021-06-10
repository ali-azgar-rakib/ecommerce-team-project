<?php

use App\Http\Controllers\Admin\Brands\BrandsController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Category\SubCategoryController;
use App\Http\Controllers\Admin\Coupon\CouponController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::view('/', 'frontend.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('user.logout');

// admin route
Route::get('/admin/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');
Route::get('/admin', [App\Http\Controllers\Admin\LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin', [App\Http\Controllers\Admin\LoginController::class, 'login']);
Route::get('/admin/logout', [App\Http\Controllers\Admin\HomeController::class, 'logout'])->name('admin.logout');


Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth:admin']], function () {
    Route::post('category/updated', [CategoryController::class, 'udpated']);
    Route::resources([
        'category' => CategoryController::class,
        'brands' => BrandsController::class,
        'sub-category' => SubCategoryController::class,
        'coupon' => CouponController::class,
    ]);
});
