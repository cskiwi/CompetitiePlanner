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

Route::get( 'users/{id}/edit', array( 'as' => 'editUser', 'uses' => 'UserController@edit' ) );
Route::post( 'users/{id}/update', array( 'as' => 'updateUser', 'uses' => 'UserController@update' ) );

Route::group( array( 'before' => 'password' ), function () {
  Route::get( '/', array( 'as' => 'index', 'uses' => 'HomeController@Index' ) );
  Route::get( '/searches', array( 'as' => 'searches', 'uses' => 'HomeController@Searches' ) );

  Route::get( 'login', array( 'as' => 'login', 'uses' => 'AuthController@login' ) );
  Route::get( 'login/link/{id}', array( 'as' => 'login.link', 'uses' => 'AuthController@linkLogin' ) );
  Route::get( 'login/social/{type}', array( 'as' => 'login.social', 'uses' => 'AuthController@socialLogin' ) );

  Route::get( 'logout', array( 'as' => 'logout', 'uses' => 'AuthController@logout' ) );

  Route::post( 'teams/{id}/addUser', array( 'as' => 'teams.addUser', 'uses' => 'TeamController@addUser' ) );
  Route::post( 'teams/{id}/deleteUser', array( 'as' => 'teams.deleteUser', 'uses' => 'TeamController@deleteUser' ) );
  Route::post( 'login', array( 'as' => 'login', 'uses' => 'AuthController@checkLogin' ) );

  Route::resource( 'users', 'UserController' );
  Route::resource( 'clubs', 'ClubController' );
  Route::resource( 'teams', 'TeamController' );
  Route::resource( 'competitions', 'CompetitionController' );
} );

Route::filter( 'password', function () {
  if (Auth::Check()) {
    if (Auth::user()->password == null) {
      Session::flash( 'error', 'please set your password!' );
      return Redirect::route( 'editUser', Auth::user()->id );
    }
  }
} );