<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/about', 'App\Http\Controllers\HomeController@about')->name('home.about');

Route::get('/products/list', 'App\Http\Controllers\ProductsController@index')->name('products.index');
Route::get('/products/show/{id}', 'App\Http\Controllers\ProductsController@show')->name('products.show');

Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index');
Route::get('/cart/delete', 'App\Http\Controllers\CartController@delete')->name('cart.delete');
Route::put('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name('cart.add');

Route::middleware('auth')->group(function() {
    Route::get('cart/purchase', 'App\Http\Controllers\CartController@purchase')->name('cart.purchase');
    Route::get('/my-account/orders', 'App\Http\Controllers\MyAccountController@orders')->name('myaccount.orders');
});

Route::get('/categories/kidbags', 'App\Http\Controllers\KidbagsController@index')->name('kidbags.index');
Route::get('/categories/manbags', 'App\Http\Controllers\ManbagsController@index')->name('manbags.index');
Route::get('/categories/womanbags', 'App\Http\Controllers\WomanbagsController@index')->name('womanbags.index');

Auth::routes();



