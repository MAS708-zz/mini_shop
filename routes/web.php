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


Route::resources([
    'product' => 'ProductController',
    'productCategories' => 'productCategoriesController',
    'member' => 'memberController',
    'memberCategories' => 'memberCategoriesController'
]);

//Route product
// Route::resource('product','ProductController');
// Route::resource('productCategories','productCategoriesController');

//Route member
// Route::resource('member', 'memberController');
// Route::resource('memberCategories', 'memberCategoriesController');
