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

Route::get('/', function () {
    return view('welcome');
});
Route::get('detail/{id}',function ($id){
    return $id;
});

Route::resource('test','TestController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('users',function (){
    $response = Http::get('http://google.com');
 ddd($response->json());
});
