<?php

return array(

  /*
  |--------------------------------------------------------------------------
  | Routing array
  |--------------------------------------------------------------------------
  |
  | This is passed to the Route::group and allows us to group and filter the
  | routes for our package
  |
  */
  'routing' => array( 'prefix' => '/social' ),

  /*
  |--------------------------------------------------------------------------
  | facebook array
  |--------------------------------------------------------------------------
  |
  | Login and request things from facebook.
  |
  */
  'facebook' => array( 'key' => '267141640140717', 'secret' => 'e92d4750626740c5a73302848fb9028f', 'scopes' => array( 'email' ), 'redirect_url' => '/login/social/facebook', ),

  /*
  |--------------------------------------------------------------------------
  | twitter array
  |--------------------------------------------------------------------------
  |
  | Login and request things from twitter
  |
  */
  'twitter' => array( 'key' => '', 'secret' => '', 'scopes' => array(), 'redirect_url' => '/login/social/twitter', ),

  /*
  |--------------------------------------------------------------------------
  | google array
  |--------------------------------------------------------------------------
  |
  | Login and request things from google
  |
  */
  'google' => array( 'key' => '357266046209-vb28v8dft2ai1v9en6kkfognk40405vp.apps.googleusercontent.com', 'secret' => 'Vw10unmbDHci2PNHpeocZQ5C', 'scopes' => array( 'email' ), 'redirect_url' => '/login/social/google', ),

  /*
  |--------------------------------------------------------------------------
  | github array
  |--------------------------------------------------------------------------
  |
  | Login and request things from github
  |
  */
  'github' => array( 'key' => '', 'secret' => '', 'scopes' => array(), 'redirect_url' => '/login/social', ),

);
