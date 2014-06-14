<?php

class UsersTableSeeder extends Seeder {

  public function run() {
    User::create( [ 'id' => 1,
                    'username' => 'cskiwi',
                    'name' => 'Glenn Latomme',
                    'email' => 'glenn.latomme@gmail.com',
                    'password' => Hash::make( 'test' ),
                    'facebook_id' => '10202184924280245',
                    'google_id' => '100086312067632213642',
                    'club_id' => 2,
                    'single' => 'D',
                    'double' => 'C2',
                    'mix' => 'D' ] );

    User::create( [ 'id' => 2,
                    'username' => '',
                    'name' => 'Steven Bastien',
                    'email' => '',
                    'password' => Hash::make( 'test' ),
                    'facebook_id' => '',
                    'google_id' => '',
                    'club_id' => 1,
                    'single' => 'C2',
                    'double' => 'C2',
                    'mix' => 'C2' ] );

    User::create( [ 'id' => 3,
                    'username' => '',
                    'name' => 'Steven De Jaeger',
                    'email' => '',
                    'password' => Hash::make( 'test' ),
                    'facebook_id' => '',
                    'google_id' => '',
                    'club_id' => 1,
                    'single' => 'D',
                    'double' => 'C2',
                    'mix' => '' ] );

    User::create( [ 'id' => 4,
                    'username' => '',
                    'name' => 'Sigi De Wever',
                    'email' => '',
                    'password' => Hash::make( 'test' ),
                    'facebook_id' => '',
                    'google_id' => '',
                    'club_id' => 1,
                    'single' => 'C2',
                    'double' => 'C2',
                    'mix' => 'C2' ] );

    User::create( [ 'id' => 5,
                    'username' => '',
                    'name' => 'Thomas Van Den Bossche',
                    'email' => '',
                    'password' => Hash::make( 'test' ),
                    'facebook_id' => '',
                    'google_id' => '',
                    'club_id' => 1,
                    'single' => 'C2',
                    'double' => 'C2',
                    'mix' => 'C2' ] );

    User::create( [ 'id' => 6,
                    'username' => '',
                    'name' => 'Mario Van Hoyweghen',
                    'email' => '',
                    'password' => Hash::make( 'test' ),
                    'facebook_id' => '',
                    'google_id' => '',
                    'club_id' => 1,
                    'single' => 'C2',
                    'double' => 'C2',
                    'mix' => 'C2' ] );

    User::create( [ 'id' => 7,
                    'username' => '',
                    'name' => 'Mikal Van Waeyenberghe',
                    'email' => '',
                    'password' => Hash::make( 'test' ),
                    'facebook_id' => '',
                    'google_id' => '',
                    'club_id' => 1,
                    'single' => 'C2',
                    'double' => 'C2',
                    'mix' => '' ] );

    User::create( [ 'id' => 8,
                    'username' => '',
                    'name' => 'Simon Verstraete',
                    'email' => '',
                    'password' => Hash::make( 'test' ),
                    'facebook_id' => '',
                    'google_id' => '',
                    'club_id' => 1,
                    'single' => '',
                    'double' => '',
                    'mix' => '' ] );

    User::create( [ 'id' => 9,
                    'username' => '',
                    'name' => 'Tony Wittevronge',
                    'email' => '',
                    'password' => Hash::make( 'test' ),
                    'facebook_id' => '',
                    'google_id' => '',
                    'club_id' => 1,
                    'single' => 'C2',
                    'double' => 'C2',
                    'mix' => '' ] );

    User::create( [ 'id' => 10,
                    'username' => '',
                    'name' => 'Eveline Bauters',
                    'email' => '',
                    'password' => Hash::make( 'test' ),
                    'facebook_id' => '',
                    'google_id' => '',
                    'club_id' => 1,
                    'single' => 'C1',
                    'double' => 'C1',
                    'mix' => 'C1' ] );

    User::create( [ 'id' => 11,
                    'username' => '',
                    'name' => 'Delphine De Smet',
                    'email' => '',
                    'password' => Hash::make( 'test' ),
                    'facebook_id' => '',
                    'google_id' => '',
                    'club_id' => 1,
                    'single' => 'C2',
                    'double' => 'C2',
                    'mix' => 'C2' ] );

    User::create( [ 'id' => 12,
                    'username' => '',
                    'name' => 'Shauni Goethals',
                    'email' => '',
                    'password' => Hash::make( 'test' ),
                    'facebook_id' => '',
                    'google_id' => '',
                    'club_id' => 1,
                    'single' => 'B2',
                    'double' => 'C2',
                    'mix' => 'C2' ] );

    User::create( [ 'id' => 13,
                    'username' => '',
                    'name' => 'Joyce Mervielde',
                    'email' => '',
                    'password' => Hash::make( 'test' ),
                    'facebook_id' => '',
                    'google_id' => '',
                    'club_id' => 1,
                    'single' => 'C2',
                    'double' => 'C1',
                    'mix' => 'C1' ] );

    User::create( [ 'id' => 14,
                    'username' => '',
                    'name' => 'Gian Verheecke',
                    'email' => 'glenn.latomme@gmail.com',
                    'password' => Hash::make( 'test' ),
                    'facebook_id' => '10202184924280245',
                    'google_id' => '100086312067632213642',
                    'club_id' => 2,
                    'single' => 'C2',
                    'double' => 'C2',
                    'mix' => 'C2' ] );
  }
}