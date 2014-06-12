<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get( 'logout', array( 'as' => 'logout', 'uses' => 'AuthController@logout' ) );
Route::get( 'login/link/{id}', array( 'as' => 'login.link', 'uses' => 'AuthController@linkLogin' ) );
Route::get( 'login/social/{type}', array( 'as' => 'login.social', 'uses' => 'AuthController@socialLogin' ) );

Route::post( 'teams/{id}/addUser', array( 'as' => 'teams.addUser', 'uses' => 'TeamController@addUser' ) );


Route::resource( 'users', 'UserController' );
Route::resource( 'clubs', 'ClubController' );
Route::resource( 'teams', 'TeamController' );

Route::get( '/', array( 'as' => 'index', function () {
  return View::make( 'hello' );
} ) );



