<?php

use Illuminate\Support\Facades\Auth;
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

//------------User-----------

Route::get('/user', 'UserController@index');

Route::post('/upload', 'UserController@uploadAvatar');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



//---------Todo--------
Route::get('/todo', 'TodoController@index')->name('todo.index');
Route::get('/todo/create', 'TodoController@create');
Route::post('/todo/create', 'TodoController@store');
Route::get('/todo/{todo}/show', 'TodoController@show');
Route::get('/todo/{todo}/edit', 'TodoController@edit');
Route::patch('/todo/{todo}/update', 'TodoController@update')->name('todo.update');
Route::delete('/todo/{todo}/delete', 'TodoController@destroy')->name('todo.destroy');

Route::put('/todo/{todo}/complete', 'TodoController@complete')->name('todo.complete');
Route::delete('/todo/{todo}/incomplete', 'TodoController@incomplete')->name('todo.incomplete');
Route::get('/todo/create', 'TodoController@categoryList');