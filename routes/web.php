<?php
use App\Http\Controllers\HomeController;
use PHPUnit\Util\Test;

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
    Route::group(['middleware' => ['activated']],function()
    {
        Route::group(['middleware' => ['user_expired']],function()
        {
            
            Route::get('/Connection', 'ConnectionController@ConnectionView');



        Route::resource('PageCrud', 'PageCrudController')
    ->middleware('admin');
    Route::get('/admin', 'PageCrudController@index')
    ->middleware('admin');  

    Route::get('/Users', 'UsersController@index')
    ->middleware('admin');  
    
        Route::get('/dashboard', 'HomeController@index')
    ->name('dashboard');
    Route::resource('ActivationCode', 'ActivationCodeController')
    ->middleware('admin');  
        });
    });
    Route::get('ActivateAccount/ActivationCode', 'ExpiredAccountController@expired')
    ->name('Account.expired');
    Route::post('ActivateAccount/account.post_activate', 'ExpiredAccountController@postActivate')
    ->name('account.post_activate');
    
   
   
});
    
    Route::get('/AccessDenied', 'HomeController@accessdenied')
    ->name('lol');


Route::get('/', function () {
    return view('welcome');
});


Route::get('/{page}', 'PagesController@page')->name('page');
