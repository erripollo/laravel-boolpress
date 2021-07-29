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

/* Guest Routes */
Route::get('/', 'PageController@home')->name('home');
Route::get('search', 'PageController@search')->name('search');

Route::get('contacts', 'ContactController@form')->name('contacts');
Route::post('contacts', 'ContactController@send')->name('contacts.send');

/* Pagine dei Posts */
Route::resource('posts', PostController::class)->only(['index', 'show']);

/* Pagine categories */
Route::get('categories/{category:slug}', 'CategoryController@show')->name('categories.show');


Auth::routes();


/* Admin Routes */
Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function ()
{
    Route::get('/', 'HomeController@index')->name('dashboard');
    Route::resource('posts', PostController::class);
    Route::resource('categories', CategoryController::class);                  
});