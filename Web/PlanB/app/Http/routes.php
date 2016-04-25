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
		Route::get('/', ['as' => 'admin', function(){
			$projecten=\App\Project::all();
			$themas=\App\Thema::all();
			$active='projecten';
			return view('admin.admin',compact('projecten','themas','active'));
		}]);

		// Projecten
		Route::get('/project/nieuw', ['as' => 'project.create', 'uses' => 'Admin\ProjectController@create']);
		Route::post('/project', ['as' => 'project.store', 'uses' => 'Admin\ProjectController@store']);
		Route::get('/projecten', ['as' => 'admin.projecten.index', 'uses' => 'Admin\ProjectController@index']);

		// Milestones
		Route::get('/project/{project}/milestone/nieuw',['as'=>'admin.milestone.create','uses'=>'Admin\MilestoneController@create']);
		Route::post('/project/{project}/milestone/',['as'=>'admin.milestone.store','uses'=>'Admin\MilestoneController@store']);

		// Themas
		Route::get('/thema/nieuw',['as'=>'admin.thema.create','uses'=>'Admin\ThemaController@create']);
		Route::post('/thema/',['as'=>'admin.thema.store','uses'=>'Admin\ThemaController@store']);

		// Vragen
		Route::get('/project/{project}/{milestone}/vraag/nieuw',['as'=>'admin.vraag.create','uses'=>'Admin\VraagController@create']);
		Route::post('/project/{project}/{milestone}/vraag/',['as'=>'admin.vraag.store','uses'=>'Admin\VraagController@store']);

		// Upload routes
		Route::get('/upload', ['as' => 'upload.index', 'uses' => 'Admin\UploadController@index']);
		Route::get('/upload-picker', ['as' => 'upload.picker', 'uses' => 'Admin\UploadController@picker']);
		Route::post('/upload/file', ['as' => 'upload.file', 'uses' => 'Admin\UploadController@uploadFile']);
		Route::delete('/upload/file', 'Admin\UploadController@deleteFile');
		Route::post('/upload/folder', 'Admin\UploadController@createFolder');
		Route::delete('/upload/folder', 'Admin\UploadController@deleteFolder');
	});
	Route::group(['prefix' => 'api'], function () {
		Route::get('project/{id}', 'APIController@getProject');
		Route::get('themas', 'APIController@getAlleThemas');
        Route::get('projecten','APIController@getProjecten');
        Route::get('thema/{id}','APIController@getProjectenOpThema');
		Route::post('like/{milestone_id}', 'APIController@likeMilestone');
		Route::post('dislike/{milestone_id}', 'APIController@dislikeMilestone');
	});

});
