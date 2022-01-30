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

Route::get('restorant/{data}', 'HomeController@index')->name('index');
Route::get('get_product/{data}','HomeController@product_by_category')->name('category');
Route::get('get_data','HomeController@get_data')->name('get_data');

