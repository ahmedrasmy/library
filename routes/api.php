<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// API Books
// Show All Books
Route::get('/books','App\Http\Controllers\ApiBookController@index');
// Show One Book
Route::get('/books/show/{id}','App\Http\Controllers\ApiBookController@show');
//Store One Book
Route::post('/books/store','App\Http\Controllers\ApiBookController@store');
//update One Book
Route::post('/books/update/{id}','App\Http\Controllers\ApiBookController@update');
//Delete book
Route::get('/books/delete/{id}','App\Http\Controllers\ApiBookController@delete');
