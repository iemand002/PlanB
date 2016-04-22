<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('projecten', ['as' => 'projecten.index', 'uses' => 'ProjectController@index']);
    Route::get('project/{project}',['as'=>'project.show','uses'=>'ProjectController@show']);
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/project/nieuw', ['as' => 'project.create', 'uses' => 'Admin\ProjectController@create']);
        Route::post('/project', ['as' => 'project.store', 'uses' => 'Admin\ProjectController@store']);
        Route::get('projecten', ['as' => 'admin.projecten.index', 'uses' => 'Admin\ProjectController@index']);

        Route::get('/project/{project}/milestone/nieuw',['as'=>'admin.milestone.create','uses'=>'Admin\MilestoneController@create']);
    });
    Route::group(['prefix' => 'api'], function () {
        Route::get('project/{id}', 'APIController@getProject');
        Route::get('themas', 'APIController@getAlleThemas');
    });
});
