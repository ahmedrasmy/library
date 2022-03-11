<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

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


Route::middleware('isLogin')->group(function()
{
    // Create

    Route::get('/books/create','App\Http\Controllers\BookController@create')->name('books.create');

    Route::post('/books/store','App\Http\Controllers\BookController@store')->name('books.store');

    //Update

    Route::get('/books/edit/{id}','App\Http\Controllers\BookController@edit')->name('books.edit');

    Route::post('/books/update/{id}','App\Http\Controllers\BookController@update')->name('books.update');

    // Create Categories

    Route::get('/categories/create','App\Http\Controllers\CategoryController@create')->name('categories.create');

    Route::post('/categories/store','App\Http\Controllers\CategoryController@store')->name('categories.store');

    //Update Categories

    Route::get('/categories/edit/{id}','App\Http\Controllers\CategoryController@edit')->name('categories.edit');

    Route::post('/categories/update/{id}','App\Http\Controllers\CategoryController@update')->name('categories.update');

    // Logout

    Route::get('/logout','App\Http\Controllers\AuthController@logout')->name('auth.logout');

    // Create Note For users
    Route::get('/notes/create','App\Http\Controllers\NoteController@create')->name('notes.create');
    Route::post('/notes/store','App\Http\Controllers\NoteController@store')->name('notes.store');
});

//Is Admin
Route::middleware('isLoginAdmin')->group(function()
{
    //Delete book
    Route::get('/books/delete/{id}','App\Http\Controllers\BookController@delete')->name('books.delete');

    //Delete Categories
    Route::get('/categories/delete/{id}','App\Http\Controllers\CategoryController@delete')->name('categories.delete');

});
// Read 
Route::get('/books','App\Http\Controllers\BookController@index')->name('books.index');
Route::get('/books/show/{id}','App\Http\Controllers\BookController@show')->name('books.show');


// Read Categories
Route::get('/categories','App\Http\Controllers\CategoryController@index')->name('categories.index');
Route::get('/categories/show/{id}','App\Http\Controllers\CategoryController@show')->name('categories.show');


Route::middleware('isGuest')->group(function()
{
    //Authentication
    //register
    Route::get('/register','App\Http\Controllers\AuthController@register')->name('auth.register');
    Route::post('/handle-register','App\Http\Controllers\AuthController@handleRegister')->name('auth.handle-register');

    // Login
    Route::get('/login','App\Http\Controllers\AuthController@login')->name('auth.login');
    Route::post('/handle-login','App\Http\Controllers\AuthController@handleLogin')->name('auth.handle-login');

});


Route::get('/login/github/redirect', function () {
    return Socialite::driver('github')->redirect();
})->name('auth.github.redirect');
 
Route::get('/login/github/callback', function () {
    $user = Socialite::driver('github')->user();
    // dd($user->email);
    // $user->token
    $email=$user->email;
    $db_user=User::where('email','=',$email)->first();
    if($db_user==null){
        $registered_user = User::create([
            'name' =>$user-> name,
            'email' =>$user-> email,
            'password' =>Hash::make('123456') ,
            'oauth_token' =>$user->token,

        ]);

        Auth::login($registered_user);
    }
    else
    {
        Auth::login($db_user);
    }
    return redirect( route('books.index') );
})->name('auth.github.callback');