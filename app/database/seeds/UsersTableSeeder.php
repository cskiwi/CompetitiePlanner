<?php

class UsersTableSeeder extends Seeder {

  public function run() {
    User::create( [ 'id' => 1,
                    'username' => 'cskiwi',
                    'name' => 'Glenn Latomme',
                    'email' => 'glenn.latomme@gmail.com',
                    'facebook_id' => '10202184924280245',
                    'google_id' => '100086312067632213642',
                    'club_id' => 1,
                    'single' => 'D',
                    'double' => 'C2',
                    'mix' => 'D' ] );

    User::create( [ 'id' => 2,
                    'username' => 'mikalvw',
                    'name' => 'Mikal Van wayenberghe',
                    'email' => 'mikalvw@gmail.com',
                    'password' => Hash::make( 'test' ),
                    'club_id' => 2 ] );
    User::create( [ 'id' => 3,
                    'username' => 'cskiwi',
                    'name' => 'Glenn Latomme 2',
                    'email' => 'glenn.latomm@gmail.com',
                    'password' => Hash::make( 'test' ),
                    'club_id' => 1 ] );
  }
}