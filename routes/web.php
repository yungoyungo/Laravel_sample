<?php

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

/* Route::get('/', function () {
    return view('welcome');
}); */

//Route::get('/', 'WelcomeController@index')->name('home');
Route::get('contact', 'PagesController@contact')->name('contact');
Route::get('about', 'PagesController@about')->name('about');

//Route::get('articles', 'ArticlesController@index')->name('articles.index');
// この場合createは{id}のルートより前に記述しなければいけない
//Route::get('articles/create', 'ArticlesController@create')->name('articles.create');
//Route::get('articles/{id}', 'ArticlesController@show')->name('articles.show');
//Route::post('articles', 'ArticlesController@store')->name('articles.store');
//Route::get('articles/{id}/edit', 'ArticlesController@edit')->name('articles.edit');
//Route::patch('articles/{id}', 'ArticlesController@update')->name('articles.update');
//Route::delete('articles/{id}', 'ArticlesController@destroy')->name('articles.destroy');


Route::get('/', 'ArticlesController@index')->name('home');
Route::resource('articles', 'ArticlesController');

//php artisan make:controller PostsController --resource すれば一発でルーティングできる
//Route::resource('posts', 'PostsController');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
