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



// home

Route::get('/', function () {
    return view('index');
});

Route::get('/home', 'HomeController@index')->name('home');

// inscription
Auth::routes(['register'=> false]);
Route::get('inscription', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('inscription', 'Auth\RegisterController@register');

//billet
Route::get('/billet/new', 'BilletController@create')->name('billet.create');

//comments
Route::post('/comment/{id}', 'CommentController@store')->name('comment.store');

//admin
Route::get('/admin', 'AdminController@index')->name('admin.index'); 
Route::get('/admin/users', 'AdminController@users')->name('admin.users'); 
Route::get('/admin/billets', 'AdminController@billets')->name('admin.billets'); 
Route::get('/admin/comments', 'AdminController@comments')->name('admin.comments'); 
Route::get('/admin/updateUsers/{id}', 'AdminController@update')->name('admin.updateUsers'); 


//user
Route::resource('/user', 'UserController');

//comments resource
Route::resource('/comment', 'CommentController',[
    'except'=>['create','store']
]);
//billet resource
Route::resource('/billet', 'BilletController', [
    'except' => ['create']
]);