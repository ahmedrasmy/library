<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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

// Read 
Route::get('/books','App\Http\Controllers\BookController@index')->name('books.index');
Route::get('/books/show/{id}','App\Http\Controllers\BookController@show')->name('books.show');

// Create

Route::get('/books/create','App\Http\Controllers\BookController@create')->name('books.create');

Route::post('/books/store','App\Http\Controllers\BookController@store')->name('books.store');

//Update

Route::get('/books/edit/{id}','App\Http\Controllers\BookController@edit')->name('books.edit');

Route::post('/books/update/{id}','App\Http\Controllers\BookController@update')->name('books.update');

//Delete 

Route::get('/books/delete/{id}','App\Http\Controllers\BookController@delete')->name('books.delete');
