<?php

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

Route::get('/', 'PageController@home');
// Route::get('/product', 'ProductController@index');
// Route::get('/product/create', 'ProductController@create');
// Route::get('/product/{product}', 'ProductController@show');
// Route::post('/product', 'ProductController@store');
// Route::delete('/product/{product}', 'ProductController@destroy');
// Route::get('/product/{product}/edit', 'ProductController@edit');
// Route::patch('/product/{product}', 'ProductController@update');
Route::resource('product','ProductController');

Route::get('/productCategories', 'productCategoriesController@index');
Route::get('/productCategories/{product_categories}', 'productCategoriesController@show');
// Route::resource('productCategories','productCategoriesController');
