<?php

use App\Http\Controllers\Admin\Brands\BrandsController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Category\SubCategoryController;
use App\Http\Controllers\Admin\Coupon\CouponController;
use App\Http\Controllers\Admin\NewsLatter\NewsLatterController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\WishlistController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SingleProductController;
use App\Models\Admin\SubCategory;
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

Route::get('/', [FrontendController::class, 'index']);

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
    Route::get('subscriber', [NewsLatterController::class, 'index'])->name('subscriber.index');
    Route::get('/get/subcategory/{id}', [SubCategoryController::class, 'getSubCategoryByCategoryId']);
    Route::get('/change/product/status/{product}', [ProductController::class, 'changeStatus'])->name('product.status.change');
    Route::resources([
        'category' => CategoryController::class,
        'brands' => BrandsController::class,
        'sub-category' => SubCategoryController::class,
        'coupon' => CouponController::class,
        'product' => ProductController::class,
    ]);
});



// frontend

Route::post('/newslater', [FrontendController::class, 'newsletter'])->name('newslater');
Route::get('/add/wishlist/{id}', [WishlistController::class, 'add_wishlist']);
Route::get('/add/cart/{product}', [CartController::class, 'add_cart']);
Route::post('/add/cart/{product}', [CartController::class, 'add_cart_from_post_req'])->name('add.cart');
Route::get('/cart/content', [CartController::class, 'cart_content']);
Route::get('/product/{product_id}/{product_name}', [SingleProductController::class, 'index'])->name('single.product.index');
