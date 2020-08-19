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

Route::get('/', function () {
    return view('welcome');
});
Route::get('products/search','ProductController@search')->name('products.search');
Route::resource('products','ProductController');


//Route::prefix('products')->group(function (){
//    Route::get('/','ProductController@getAll')->name('product.list');
//    Route::get('/add','ProductController@showFormAdd')->name('products.showFormAdd');
//});
