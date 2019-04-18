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




Auth::routes();

Route::group(['middleware' => ['auth']], function()
{
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::resource('PageCrud', 'PageCrudController')
    ->middleware('admin');
   
   
});
    Route::get('/admin', 'PageCrudController@index')->middleware('admin');  
    Route::get('/AccessDenied', 'HomeController@accessdenied')->name('lol');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/{page}', 'PagesController@page')->name('page');
