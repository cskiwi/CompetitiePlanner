<?php

// Composer: "fzaninotto/faker": "v1.3.0"

class AuthorityTableSeeder extends Seeder {

  public function run() {
    DB::table( 'roles' )->delete();
    Role::create( array( 'name' => 'admin' ) );
    Role::create( array( 'name' => 'member' ) );


  }

}