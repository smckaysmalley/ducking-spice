<?php

Route::get('/', 'HomeController@index');

Route::resource('session','SessionController');


// Catch All Route
App::missing(function() {
    return Redirect::route('home.index');
});