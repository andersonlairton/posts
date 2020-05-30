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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/posts','PostsController@lista')->name('posts.listagem')->middleware('auth');
Route::get('/posts/novo','PostsController@novo')->name('posts.novo');
Route::post('/posts/adiciona','PostsController@adiciona')->name('posts.adiciona');
Route::post('/posts/update/{id}','PostsController@update')->name('posts.update');
Route::get('/posts/editar/{id}','PostsController@editar');