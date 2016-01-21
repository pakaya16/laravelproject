<?php

// use Cache ;
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


Route::group(['middleware' => ['bannertoolcheckpermission']], function () {

	Route::resource('admin/groupuser', 'Admin\GroupuserController', ['except' => ['show']]);
	Route::resource('admin/user', 'Admin\UserController', ['except' => ['show']]);
	Route::resource('admin/location', 'Admin\LocationController', ['except' => ['show']]);
	Route::resource('admin/login', 'Admin\LoginController', ['only'=>['index', 'store']]); 

	

	Route::get('golf',function(Illuminate\Http\Request $request)
	{
		// $golf = [
		// 			['id'=>12,'name'=>'golf'] ,
		// 			['id'=>13,'name'=>'golf1'] ,
		// 			['id'=>14,'name'=>'golf2'] ,
		// 			['id'=>15,'name'=>'golf3'] ,
		// 	];

		// // $collection = collect($golf) ;

		// return $collection = collect(['taylor', 'abigail', null])->map(function ($name) {
		//     return strtoupper($name);
		// }) ;

		// dd($collection) ;
		d( $request->session()->all() ) ;
		// return action('banner\UserController@create');
	});

	Route::resource('admin/dashboard', 'Admin\DashboardController', ['only'=>'index']); 

	Route::get('admin/logout', 'Admin\LoginController@logout');
	Route::get('admin/changelang', 'Admin\LoginController@lang');
	
});


Route::group(['middleware' => ['frontend']], function () {




});