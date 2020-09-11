<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Admin
Route::get('users/', 'API\UsersController@index');
Route::get('users/agent', 'API\UsersController@agent');
Route::get('users/brokerage', 'API\UsersController@brokerage');
Route::get('users/client', 'API\UsersController@client');
Route::post('users/', 'API\UsersController@store');
Route::delete('users/{id}', 'API\UsersController@destroy');
Route::put('users/{id}', 'API\UsersController@update');

// Client Route
Route::get('agent', 'API\AgentController@index');
Route::get('get_agent_data', 'API\AgentController@getAgentData');
Route::put('agent/{id}', 'API\AgentController@update');

Route::post('/client_question/wave_one/store', 'ClientQuestionController@waveOne')->name('client.question.store');


// ?\Broker Route::currentRouteAction();

Route::resource('/broker', 'API\BrokerageController');


Route::get('/getBroker', 'API\AgentController@getBroker');
Route::post('/agent', 'API\AgentController@store');


Route::get('uniqueUrl', 'UniqueUrlController@url');
