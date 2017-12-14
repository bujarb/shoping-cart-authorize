<?php

Auth::routes();

Route::get('/',[
	'uses' => 'ProductController@getIndex',
	'as' => 'product.index'
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

Route::get('/user/profile',[
	'uses' => 'ProfileController@getProfile',
	'as'=>'user.profile',
	'middleware' => 'auth'
]);

Route::get('/logout',[
	'uses' => 'Auth\LoginController@logout',
	'as'=>'user.logout',
	'middleware' => 'auth'
]);
