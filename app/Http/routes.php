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



Route::get('/', 'FrontController@index');


//Route::get('search', 'FrontController@showAll');

Route::get('apero/{id}', 'FrontController@showApero');

Route::get('create', 'FrontController@createApero');

Route::post('create', 'FrontController@store');

Route::any ('search', 'SearchController@search' );

Route::any('login', 'LoginController@login');

Route::any('logout', 'LoginController@logout');

Route::group(['prefix' =>'admin', 'middleware' => 'auth'], function(){


    Route::resource('apero', 'AperoController');

});


/*Route::get('/', function () {
    return view('welcome');
});*/
