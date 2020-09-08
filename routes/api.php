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
Route::post('users/', 'API\UsersController@store')->middleware('admin');
Route::delete('users/{id}', 'API\UsersController@destroy');
Route::put('users/{id}', 'API\UsersController@update');

// Client Route
Route::get('agent', 'API\AgentController@index');
Route::get('get_agent_data', 'API\AgentController@getAgentData');
Route::put('agent/{id}', 'API\AgentController@update');

Route::post('/client_question/wave_one/store', 'ClientQuestionController@waveOne')->name('client.question.store');
