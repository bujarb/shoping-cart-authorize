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

Auth::routes();

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

Route::get('/',[
	'uses' => 'ProductController@getIndex',
	'as' => 'product.index'
]);

Route::get('/addproduct',[
	'uses' => 'ProductController@getAddProduct',
	'as' => 'product.add',
	'middleware' => 'auth'
]);

Route::post('/addproduct',[
	'uses' => 'ProductController@postAddProduct',
	'as' => 'product.add',
	'middleware' => 'auth'
]);


Route::get('/add-to-cart/{id}',[
	'uses' => 'ProductController@getAddToCart',
	'as' => 'product.addToCart',
	'middleware' => 'auth'
]);

Route::get('/shoping-cart',[
	'uses' => 'ProductController@getCart',
	'as' => 'product.shoppingCart'
]);

Route::get('/checkout',[
	'uses' => 'ProductController@getCheckout',
	'as' => 'checkout',
	'middleware' => 'auth'
]);

Route::post('/checkout',[
	'uses' => 'ProductController@postCheckout',
	'as' => 'checkout',
	'middleware' => 'auth'
]);

Route::get('/item/{id}',[
	'uses' => 'ProductController@getSingle',
	'as' => 'single'
]);

Route::get('/category/{id}',[
	'uses' => 'ProductController@getAllByCategory',
	'as' => 'category'
]);

Route::get('/user/profile',[
	'uses' => 'UserController@getProfile',
	'as'=>'user.profile',
	'middleware' => 'auth'
]);

Route::get('/logout',[
	'uses' => 'Auth\LoginController@logout',
	'as'=>'user.logout',
	'middleware' => 'auth'
]);



