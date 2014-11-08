<?php

Route::get('/', 'HomeController@index');
Route::get('/logout', 'SessionController@destroy');
Route::get('/user','UserController@show');
Route::get('/user/edit','UserController@edit');
// Probably don't need this route. Use the new AdminController route at admin.index
Route::get('/admin','AdminController@index');

Route::post('/account/show','AccountController@show');
Route::post('/account/store', 'AccountController@store');
Route::post('/account/delete','AccountController@destroy');
Route::post('/account/update','AccountController@update');

Route::resource('session','SessionController', ['only'=>['create','store']]);
Route::resource('user','UserController', ['only'=>['create','store','show','edit','update']]);
Route::resource('home','HomeController', ['only'=>['index']]);
Route::resource('account','AccountController');
Route::resource('admin','AdminController', ['only'=>['index']]);

// Catch All Route
App::missing(function() {
    return Redirect::route('session.create')->with('error','404: This page does not exist!');
});