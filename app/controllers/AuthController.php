<?php

class AuthController extends BaseController {

  public function logout() {
    Auth::logout();
    return Redirect::back();;
  }

  public function login() {
    return View::make( 'auth.login' );
  }

  public function checkLogin() {
    $rules = array(
      'user' => 'required|min:3',
      'password' => 'required|min:3'
    );

    $validator = Validator::make( Input::all(), $rules );

    if ($validator->fails()) {
      return Redirect::back()->withInput()->withErrors( $validator );
    } else {

      $emailReg = "^[_A-Za-z0-9-\\+]+(\\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\\.[A-Za-z0-9]+)*(\\.[A-Za-z]{2,})$^";

      // create our user data for the authentication
      $userData = [ 'password' => Input::get( 'password' ) ];
      $userData[( preg_match( $emailReg, Input::get( 'user' ) ) ? 'email' : 'username' )] = Input::get( 'user' );

      // attempt to do the login
      if (Auth::attempt( $userData, true, true )) {
        return Redirect::back();
      } else {
        return Redirect::route( 'login' )
                       ->withInput( Input::except( 'password' ) )
                       ->withErrors( array( 'password' => 'Wrong password/username combination' ) );
      }
    }
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

            if ($user->photo == null) {
              $user->photo = $loginInfo->picture;
            }

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

            if ($user->photo == null) {
              $facebook_detail = Social::facebook( 'me?fields=id' );
              $user->photo = 'https://graph.facebook.com/' . $facebook_detail->id . '/picture?type=large';
            }
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

    return Redirect::back()->with( [ 'error' => $error ] );
  }
}