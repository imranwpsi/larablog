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

//User Routes
Route::group(['namespace' => 'User'],function(){
	Route::get('/','HomeController@index');
	Route::get('post/{post}','PostController@post')->name('post');

	Route::get('latest-posts','HomeController@show_all_letest_post');

	Route::get('post/category/{category}','HomeController@category')->name('category');
	Route::get('post/tag/{tag}','HomeController@tag')->name('tag');
});

//Admin Routes
Route::group(['namespace' => 'Admin'],function(){
	Route::get('admin/home','HomeController@index')->name('admin.home');
	// Post Routes
	Route::resource('admin/post','PostController');
	Route::resource('admin/category','CategoryController');
	Route::resource('admin/tag','TagController');
	Route::resource('admin/user','UserController');
	Route::resource('admin/role','RoleController');
	Route::resource('admin/permission','PermissionController');

	// Admin Auth Routes
	Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
	Route::post('admin-login', 'Auth\LoginController@login');
	Route::post('admin-logout', 'Auth\LoginController@logout');
});



// User Routes
// Route::group(['namespace' => 'User'],function(){
// 	Route::get('/','HomeController@index');
// 	Route::get('post/{post}','PostController@post')->name('post');

// 	Route::get('post/tag/{tag}','HomeController@tag')->name('tag');
// 	Route::get('post/category/{category}','HomeController@category')->name('category');

// 	//vue routes
// 	Route::post('getPosts','PostController@getAllPosts');
// 	Route::post('saveLike','PostController@saveLike');
// });

// //Admin Routes
// Route::group(['namespace' => 'Admin'],function(){
// 	Route::get('admin/home','HomeController@index')->name('admin.home');
// 	// Users Routes
// 	Route::resource('admin/user','UserController');
// 	// Roles Routes
// 	Route::resource('admin/role','RoleController');
// 	// Permission Routes
// 	Route::resource('admin/permission','PermissionController');
// 	// Post Routes
// 	Route::resource('admin/post','PostController');
// 	// Tag Routes
// 	Route::resource('admin/tag','TagController');
// 	// Category Routes
// 	Route::resource('admin/category','CategoryController');
// 	// Admin Auth Routes
// 	Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
// 	Route::post('admin-login', 'Auth\LoginController@login');
// });


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
