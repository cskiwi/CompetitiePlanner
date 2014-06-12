<?php

class AuthController extends BaseController {

  public function logout() {
    Auth::logout();
    return Redirect::to( '/' );
  }


  public function linkLogin($id) {
    echo $id;
  }

  public function socialLogin($type) {
    $error = null;
    $user = null;

    switch ($type) {
      case 'google':
        $loginInfo = Social::google( 'user' );
        $user = User::firstOrNew( array( 'email' => $loginInfo->email ) );
        if ($user->google_id) {
          // check if ID is the same

          if ($user->google_id == $loginInfo->id) {
            // all good
            $user->loginMethod = 'google';
            $user->save();
          } else {
            // Other user trying to access this one
            $error = 'account_mismatch requested id: ' . $user->google_id . ', givven id: ' . $loginInfo->id;
            $user = null;
          }
        } else {
          $user->google_id = $loginInfo->id;

          if ($user->id == null) {
            // is new user
            $user->name = $loginInfo->given_name . ' ' . $loginInfo->family_name;
          }

          $user->loginMethod = 'google';
          $user->save();
        }
        break;
      case 'facebook':
        $loginInfo = Social::facebook( 'user' );
        $user = User::firstOrNew( array( 'email' => $loginInfo->email ) );
        if ($user->facebook_id) {
          // check if ID is the same
          if ($user->facebook_id == $loginInfo->id) {
            // all good
            $user->loginMethod = 'facebook';
            $user->save();
          } else {
            // Other user trying to access this one
            $error = 'account_mismatch requested id: ' . $user->facebook_id . ', givven id: ' . $loginInfo->id;
            $user = null;
          }
        } else {
          // no fb login
          $user->facebook_id = $loginInfo->id;

          if ($user->id == null) {
            // is new user
            $user->name = $loginInfo->first_name . ' ' . $loginInfo->last_name;
          }
          $user->loginMethod = 'facebook';
          $user->save();
        }
        break;
      case 'twitter':
        $loginInfo = Social::twitter( 'user' );
        $user = User::firstOrNew( array( 'email' => $loginInfo->email ) );
        if ($user->twitter_id) {
          // check if ID is the same
          if ($user->twitter_id == $loginInfo->id) {
            // all good
            $user->loginMethod = 'twitter';
            $user->save();
          } else {
            // Other user trying to access this one
            $user = null;
            $error = 'account_mismatch';
          }
        } else {
          $user->twitter_id = $loginInfo->id;
          // var_dump($loginInfo);die();
          if ($user->id == null) {
            // is new user
            $user->name = $loginInfo->first_name . ' ' . $loginInfo->last_name;
          }

          $user->loginMethod = 'twitter';
          $user->save();
        }
        break;
    }

    if ($user) {
      Auth::login( $user );
    }
    return Redirect::to( '/' )->with( [ 'error' => $error ] );

  }
}