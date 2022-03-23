<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\NoteController;


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




//language
Route::middleware('setLang')->group(function()
{
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/index','App\Http\Controllers\BookController@home')->name('index');

    Route::middleware('isLogin')->group(function()
    {

        Route::prefix('/books')->name('books.')->controller(BookController::class)->group(function () 
        {

             // Create

            Route::get('/create','create')->name('create');

            Route::post('/store','store')->name('store');

            //Update

            Route::get('/edit/{id}','edit')->name('edit');

            Route::post('/update/{id}','update')->name('update');
        
            
        });

       
        Route::prefix('/categories')->name('categories.')->controller(CategoryController::class)->group(function () {
            // Create Categories

            Route::get('/create','create')->name('create');

            Route::post('/store','store')->name('store');

            //Update Categories

            Route::get('/edit/{id}','edit')->name('edit');

            Route::post('/update/{id}','update')->name('update');
            
        });
        

        // Logout

        Route::get('/logout','App\Http\Controllers\AuthController@logout')->name('auth.logout');

        Route::prefix('/notes')->name('notes.')->controller(NoteController::class)->group(function () {
            // Create Note For users
            Route::get('/create','create')->name('create');
            Route::post('/store','store')->name('store');
                
        });

        
    });

    //Is Admin
    Route::middleware('isLoginAdmin')->group(function()
    {
        
        //Delete book
        Route::get('/books/delete/{id}','App\Http\Controllers\BookController@delete')->name('books.delete');

        //Delete Categories
        Route::get('/categories/delete/{id}','App\Http\Controllers\CategoryController@delete')->name('categories.delete');

    });

    Route::prefix('/books')->name('books.')->controller(BookController::class)->group(function () {
        // Read Book
        Route::get('','index')->name('index');
        Route::get('/show/{id}','show')->name('show');
        // search route 
        Route::get('/search','search')->name('search');

        
    });

    Route::prefix('/categories')->name('categories.')->controller(CategoryController::class)->group(function () {
        // Read Categories
        Route::get('','index')->name('index');
        Route::get('/show/{id}','show')->name('show');

        
    });

    

    Route::name('auth.')->controller(AuthController::class)->middleware('isGuest')->group(function()
    {
        //Authentication
        //register
        Route::get('/register','register')->name('register');
        Route::post('/handle-register','handleRegister')->name('handle-register');

        // Login
        Route::get('/login','login')->name('login');
        Route::post('/handle-login','handleLogin')->name('handle-login');

    });

    // Login With Github
    Route::prefix('/index/login/github')->name('auth.github.')->controller(AuthController::class)->group(function(){
        Route::get('/redirect','redirectSocialite')->name('redirect');
        Route::get('/callback','callbackSocialite')->name('callback');

    });

    


});


Route::prefix('/lang')->name('lang.')->controller(LangController::class)->group(function()
{
    // en
    Route::get('/en','en')->name('en');
    //ar
    Route::get('/ar','ar')->name('ar');

});
