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


Route::get('/','User\WelcomeController@index');

Auth::routes();


//user routes
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/post/tag/{tag}', 'User\HomeController@tag')->name('tag');
Route::get('/post/category/{category}', 'User\HomeController@category')->name('category');

Route::get('/dashboard', function () {
    return view('pages.user.dashboard');
});
Route::resource('/personal_details', 'PersonalDetailsController' );



Route::get('/posts', 'User\HomeController@Home');
Route::get('/post/{post}', 'User\PostController@post')->name('post');

//admin route
Route::group(['namespace'=>'Admin'],function(){
  Route::get('/admin','HomeController@index')->name('admin.home');
//user Route
  Route::resource('admin/user','UserController');

//roles controller
  Route::resource('admin/role','RoleController');

  //permission controller
    Route::resource('admin/permission','PermissionController');

  //post route
  Route::resource('admin/post','PostController');

  //Tag Route
  Route::resource('admin/tag','TagController');
  //category Route
  Route::resource('admin/category','CategoryController');

  //admin login
  Route::get('admin-login','Auth\LoginController@showLoginForm')->name('admin.login');
  //postin admin Login

  Route::post('admin-login','Auth\LoginController@login');
});




Route::get('/contact_detail',function(){
  return view('pages.contactDetail');
});
Route::get('/vacanties', function(){
  return view('pages.vacanties');
});

Route::get('/company/login',function(){
  return view('pages.company.login');
});
Route::get('/trainings/all',function(){
  return view('pages.trainings.all');
});
