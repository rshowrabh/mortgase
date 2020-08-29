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

use Laravel\Passport\Passport;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/client', 'RegisterClientController@index')->name('index.client');
Route::get('/client_question', 'RegisterClientController@question')->name('client.question');

Route::post('/register_client', 'RegisterClientController@create')->name('register.client');



Route::group(['middleware' => 'admin'], function () {
    Passport::routes(); // <-- Replace this with your own version
});


Route::get('invite', 'InviteController@invite')->name('invite');
Route::post('invite', 'InviteController@process')->name('process');
// {token} is a required parameter that will be exposed to us in the controller method
Route::get('accept/{token}', 'InviteController@accept')->name('accept');









Route::get('clear', function () {

    \Artisan::call('migrate:refresh --seed');
    \Artisan::call('storage:link');
    \Artisan::call('key:generate');
    \Artisan::call('cache:clear');
    \Artisan::call('config:clear');

    dd("Cache is cleared");
});
