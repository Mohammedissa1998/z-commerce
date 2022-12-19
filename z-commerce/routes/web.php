<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategorieController;
use App\Http\Controllers\WishlistController;
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

Route::get('/success', [PagesController::class, 'success'])->name('success');


Route::get('/', [PagesController::class, 'home'])->name('home');
Route::match(['get', 'post'], '/product-results', [PagesController::class, 'search'])->name('search');
Route::get('/cart', [PagesController::class, 'cart'])->name('cart');
Route::get('/wish-list', [PagesController::class, 'wishlist'])->name('wishlist');
Route::get('/account', [PagesController::class, 'account'])->name('account')->middleware('auth');
Route::get('/checkout', [PagesController::class, 'checkout'])->name('checkout')->middleware('auth');
Route::get('/products/{id}', [PagesController::class, 'product'])->name('product');

Route::post('/stripe-checkout', [CheckoutController::class, 'stripeCheckout'])->name('stripeCheckout')->middleware('auth');


//cart
Route::post('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('addToCart');
Route::post('/remove-from-cart/{id}', [CartController::class, 'removeFromCart'])->name('removeFromCart');

Route::post('/add-to-wishlist/{id}', [WishlistController::class, 'post'])->name('addToWishlist')->middleware('auth');
Route::post('/remove-from-wishlist/{id}', [WishlistController::class, 'remove'])->name('removeFromWishlist')->middleware('auth');
 



//Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'postRegister'])->name('register')->middleware('guest');
Route::post('/login', [AuthController::class, 'postLogin'])->name('login')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::post('/get-subcategories', [ProductController::class, 'getSubcategories'])->name('adminpanel.products.subcategories');
Route::group(['prefix' => 'adminpanel', 'middleware' => 'admin'], function()
{
    Route::get('/', [AdminController::class, 'dashboard'])->name('adminpanel');

    //products
    Route::group(["prefix" => 'products'], function()
    {
        Route::get('/', [ProductController::class, 'index'])->name('adminpanel.products');
        Route::get('/create', [ProductController::class, 'create'])->name('adminpanel.products.create');
        Route::post('/create', [ProductController::class, 'store'])->name('adminpanel.products.store');
        Route::get('/{id}', [ProductController::class, 'edit'])->name('adminpanel.products.edit');
        Route::delete('/{id}', [ProductController::class, 'destroy'])->name('adminpanel.products.destroy');
        Route::put('/{id}', [ProductController::class, 'update'])->name('adminpanel.products.edit');


    });

    Route::group(["prefix" => 'categories'], function()
    {
        Route::get('/', [CategoryController::class, 'index'])->name('adminpanel.categories');
        Route::post('/', [CategoryController::class, 'store'])->name('adminpanel.category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('adminpanel.category.edit');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('adminpanel.category.update');
        Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('adminpanel.category.destroy');
 

    });

    Route::resource('categories.subcategories', SubCategorieController::class);

    Route::group(["prefix" => 'colors'], function()
    {
        Route::get('/', [ColorController::class, 'index'])->name('adminpanel.colors');
        Route::post('/', [ColorController::class, 'store'])->name('adminpanel.color.store');
        Route::delete('/{id}', [ColorController::class, 'destroy'])->name('adminpanel.color.destroy');
 

    });

    Route::group(["prefix" => 'orders'], function()
    {
        Route::get('/', [OrderController::class, 'index'])->name('adminpanel.orders');
        Route::get('/{id}', [OrderController::class, 'view'])->name('adminpanel.orders.view');
        Route::post('/{id}', [OrderController::class, 'updateStatus'])->name('adminpanel.orders.status.update');


    });

});
