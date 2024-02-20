<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminManageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
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

Route::middleware(['admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/dashboard', 'dashboard')->name('admindashboard');
            Route::get('/addpizza', 'add_pizza')->name('addpizza');
            Route::post('/addpizza', 'add_pizza_post')->name('addpizzapost');
            Route::get('/crustmanage', 'add_crust')->name('crustmanage');
            Route::post('/crustmanage', 'add_crust_post')->name('crustmanagepost');
            Route::get('/colddrink', 'add_drink')->name('colddrink');
            Route::post('/colddrink', 'add_drink_post')->name('colddrinkpost');
            Route::get('/managepizzas','manage_pizzas')->name('managepizzas');
        });
        Route::controller(AdminManageController::class)->group(function () {
            Route::get('/managecustomer','manage_customer')->name('managecustomer');
            Route::get('/orders','orders')->name('orders');
            Route::get('/reports','reports')->name('reports');
        });
    });
});

Route::controller(AuthController::class)->group(function () {
    Route::get('admin/login','login')->name('adminlogin');
    Route::post('admin/login','loginpost')->name('adminloginpost');
    Route::get('admin/logout','logout')->name('adminlogout');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/','home')->name('home');
    Route::get('/register','user_register')->name('register');
    Route::post('/register','user_register_post')->name('registerpost');
    Route::get('/login','user_login')->name('login');
    Route::post('/login','user_login_post')->name('loginpost');
    Route::get('/logout','userlogout')->name('logout_user');
});

Route::middleware(['user_auth'])->group(function () {
    Route::controller(CartController::class)->group(function () {
        Route::post('/cart/add', 'add_item_cart');
        Route::get('/cart','cart2')->name('cart2');
        Route::get('/checkout' , 'checkout_action')->name('checkout');
    });
});


