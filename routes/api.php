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

Route::get('projects','ProjectsController@index');
 
Route::get('developers/{developer}','DevelopersController@show');
  
Route::post('tasks','TasksController@store');
 
Route::put('tasks/{task}','TasksController@update');
 
Route::delete('tasks/{task}','TasksController@delete');

Route::post('manager','ManagersController@login');

Route::post('developer','DevelopersController@login');