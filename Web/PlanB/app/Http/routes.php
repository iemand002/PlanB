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
	Route::get('/', ['as'=>'home',function () {
		return view('welcome');
	}]);

	// Authentication Routes...
	$this->get('login', ['as'=>'auth.login','uses'=>'Auth\AuthController@showLoginForm']);
	$this->post('login', 'Auth\AuthController@login');
	$this->get('logout', ['as'=>'auth.logout','uses'=>'Auth\AuthController@logout']);

	// Registration Routes...
	$this->get('register', ['as'=>'auth.register','uses'=>'Auth\AuthController@showRegistrationForm']);
	$this->post('register', 'Auth\AuthController@register');

	// Password Reset Routes...
	$this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
	$this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
	$this->post('password/reset', 'Auth\PasswordController@reset');

	Route::get('/home', 'HomeController@index');

	Route::get('projecten', ['as' => 'projecten.index', 'uses' => 'ProjectController@index']);
	Route::get('project/{projectPublic}',['as'=>'project.show','uses'=>'ProjectController@show']);

	//antwoord updates
	Route::get('/antwoord/{id}', ['as' => 'antwoord.edit', 'uses' => 'AntwoordController@edit']);

	//Maps
	Route::get('/kaart', ['as' => 'map.show', 'uses' => 'MapController@show']);

	Route::group(['prefix' => 'admin','middleware'=>'auth.admin'], function () {
		Route::get('/', ['as' => 'admin', function(){
			$projecten=\App\Project::all();
			$themas=\App\Thema::all();
			$active='admin';
			return view('admin.admin',compact('projecten','themas','active'));
		}]);

		// Projecten
		Route::get('/project/nieuw', ['as' => 'admin.project.create', 'uses' => 'Admin\ProjectController@create']);
		Route::delete('/project/delete/{project}', ['as' => 'admin.project.destroy', 'uses' => 'Admin\ProjectController@destroy']);
		Route::get('/project/{project}/edit', ['as' => 'admin.project.edit', 'uses' => 'Admin\ProjectController@edit']);
		Route::get('/project/{project}', ['as' => 'admin.project.show', 'uses' => 'Admin\ProjectController@show']);
		Route::post('/project', ['as' => 'admin.project.store', 'uses' => 'Admin\ProjectController@store']);
		Route::patch('/project/{project}', ['as' => 'admin.project.update', 'uses' => 'Admin\ProjectController@update']);
		Route::get('/projecten', ['as' => 'admin.projecten.index', 'uses' => 'Admin\ProjectController@index']);

		// Milestones
		Route::get('/project/{project}/milestone/nieuw',['as'=>'admin.milestone.create','uses'=>'Admin\MilestoneController@create2']);
		Route::post('/project/{project}/milestone/',['as'=>'admin.milestone.store','uses'=>'Admin\MilestoneController@store2']);
		Route::get('/project/{project}/{milestone}/edit',['as'=>'admin.milestone.edit','uses'=>'Admin\MilestoneController@edit2']);
		Route::get('/project/{project}/{milestone}',['as'=>'admin.milestone.show','uses'=>'Admin\MilestoneController@show']);
		Route::patch('/project/{project}/{milestone}',['as'=>'admin.milestone.update','uses'=>'Admin\MilestoneController@update2']);
		Route::delete('milestone/delete/{milestone}',['as'=>'admin.milestone.destroy','uses'=>'Admin\MilestoneController@destroy']);

		// Themas
		Route::get('/themas',['as'=>'admin.thema.index','uses'=>'Admin\ThemaController@index']);
		Route::get('/thema/nieuw',['as'=>'admin.thema.create','uses'=>'Admin\ThemaController@create']);
		Route::post('/thema/',['as'=>'admin.thema.store','uses'=>'Admin\ThemaController@store']);
		Route::delete('thema/delete/{thema}',['as'=>'admin.thema.destroy','uses'=>'Admin\ThemaController@destroy']);
		Route::get('thema/{thema}/edit',['as'=>'admin.thema.edit','uses'=>'Admin\ThemaController@edit']);
		Route::patch('thema/{thema}',['as'=>'admin.thema.update','uses'=>'Admin\ThemaController@update']);

		// Vragen
		Route::get('/project/{project}/{milestone}/vraag/nieuw',['as'=>'admin.vraag.create','uses'=>'Admin\VraagController@create']);
		Route::get('/project/{project}/{milestone}/{vraag}/edit',['as'=>'admin.vraag.edit','uses'=>'Admin\VraagController@edit']);
		Route::post('/project/{project}/{milestone}/vraag/',['as'=>'admin.vraag.store','uses'=>'Admin\VraagController@store']);
		Route::patch('/project/{project}/{milestone}/{vraag}',['as'=>'admin.vraag.update','uses'=>'Admin\VraagController@update']);
		Route::delete('vraag/delete/{vraag}',['as'=>'admin.vraag.destroy','uses'=>'Admin\VraagController@destroy']);

		// Upload routes
		Route::get('/upload', ['as' => 'upload.index', 'uses' => 'Admin\UploadController@index']);
		Route::get('/upload-picker', ['as' => 'upload.picker', 'uses' => 'Admin\UploadController@picker']);
		Route::post('/upload/file', ['as' => 'upload.file', 'uses' => 'Admin\UploadController@uploadFile']);
		Route::delete('/upload/file', 'Admin\UploadController@deleteFile');
		Route::post('/upload/folder', 'Admin\UploadController@createFolder');
		Route::delete('/upload/folder', 'Admin\UploadController@deleteFolder');

		// users
		Route::get('gebruikers',['as'=>'admin.user.index','uses'=>'Admin\UserController@index']);
		Route::get('gebruiker/nieuw',['as'=>'admin.user.create','uses'=>'Admin\UserController@create']);
		Route::post('gebruiker',['as'=>'admin.user.store','uses'=>'Admin\UserController@store']);
		Route::get('gebruiker/{user}/edit',['as'=>'admin.user.edit','uses'=>'Admin\UserController@edit']);
		Route::patch('gebruiker/{user}',['as'=>'admin.user.update','uses'=>'Admin\UserController@update']);
		Route::delete('gebruiker/delete/{user}',['as'=>'admin.user.destroy','uses'=>'Admin\UserController@destroy']);
		Route::post('reset-wachtwoord', ['as'=>'admin.reset-wachtwoord','uses'=>'Admin\UserController@sendResetLinkEmail']);


	});

});
Route::group(['prefix' => 'api'], function () {
	Route::get('project/{id}', 'APIController@getProject');
	Route::get('themas', 'APIController@getAlleThemas');
	Route::get('projecten','APIController@getProjecten');
	Route::get('thema/{id}','APIController@getProjectenOpThema');
	Route::get('like/{milestone_id}', 'APIController@likeMilestone'); // UNITY post werkt niet
	Route::get('dislike/{milestone_id}', 'APIController@dislikeMilestone'); // UNITY post werkt niet
});

