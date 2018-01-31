<?php

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

use App\Product;

Route::get('/', function () {

	$products = Product::orderBy('name', 'ASC')->paginate(9);	
    return view('welcome', compact('products'));
});


Auth::routes();

Route::get('/home', 'StoreController@index')->name('home');
Route::post('/like', 'StoreController@like')->name('like.snack');

Route::get('/snack/{id}', 'StoreController@show');
Route::put('/buysnack', 'StoreController@buysnack')->name('buy.product');
Route::get('/searchSnacks', 'StoreController@searchSnack')->name('search.product');
Route::get('/popular_Snacks', 'StoreController@popularSnacks')->name('popular.products');

Route::get('/web_searchSnacks', 'GuestController@searchSnack')->name('web.search.product');
Route::get('/most_popular_Snacks', 'GuestController@popularSnacks')->name('most.popular.products');



Route::prefix('admin')->group(function(){
	
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	
	Route::put('/changeprice', 'AdminProductController@changePriceProduct')->name('change.product.price');
	Route::put('/changeamount', 'AdminProductController@changeAmountProduct')->name('change.product.amount');
	
	
	Route::get('/', 'AdminController@index')->name('admin.dashboard');

	Route::get('/pricelog/{id}', 'AdminProductController@priceLog')->name('price.log.product');
	Route::get('/saleslog/{id}', 'AdminProductController@salesLog')->name('sales.log.product');

	Route::post('/', 'AdminProductController@addProduct')->name('add.product');
	Route::delete('/remove', 'AdminProductController@removeProduct')->name('remove.product');

	
});




