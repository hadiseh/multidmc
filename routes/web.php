<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

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

Route::get('/','HomeController@index')->name('home');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin',function(){
    return view('admin.dashboard');
})->name('dashboard');

Route::get('demand/{demand}/status/{status}','admin\DemandsController@status')->name('demand.status');
Route::resource('demand','admin\DemandsController')->except('destroy');
Route::resource('language','admin\LanguagesController');









