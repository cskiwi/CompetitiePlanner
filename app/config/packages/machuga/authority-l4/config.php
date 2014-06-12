<?php

return array(

  'initialize' => function ($authority) {

    $user = Auth::guest() ? new User : $authority->getCurrentUser();

    //action aliases
    $authority->addAlias( 'manage', array( 'create', 'read', 'update', 'delete' ) );
    $authority->addAlias( 'moderate', array( 'read', 'update', 'delete' ) );


    // Define abilities for the passed in user here. For example:
    if ($user->hasRole( 'admin' )) {
      $authority->allow( 'manage', 'all' );
    } else {
      $authority->allow( 'read', 'all' );
    }

    // loop through each of the users permissions, and create rules
    foreach ($user->permissions as $perm) {
      if ($perm->type == 'allow') {
        $authority->allow( $perm->action, $perm->resource );
      } else {
        $authority->deny( $perm->action, $perm->resource );
      }
    }
  }

);