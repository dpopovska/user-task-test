<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'tasks'], function() {

	Route::get('/{id?}', ['as' => 'task.index', 'uses' => 'TaskController@getAllTasks']);

	Route::post('store', ['as' => 'task.store', 'uses' => 'TaskController@postStoreTask']);

	Route::patch('/{id}/update', ['as' => 'task.update', 'uses' => 'TaskController@postUpdateTask']);

	Route::delete('/{id}/delete', ['as' => 'task.delete', 'uses' => 'TaskController@postDeleteTask']);

});
