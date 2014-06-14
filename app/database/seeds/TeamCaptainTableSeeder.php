<?php

class TeamCaptainTableSeeder extends Seeder {

  public function run() {
    DB::table( 'team_captain' )
      ->insert( [ [ 'team_id' => 1, 'user_id' => 1 ], // admin stuff
                  [ 'team_id' => 2, 'user_id' => 1 ], // admin stuff
                  [ 'team_id' => 3, 'user_id' => 1 ], // admin stuff
                  [ 'team_id' => 4, 'user_id' => 6 ],
                  [ 'team_id' => 2, 'user_id' => 5 ],
                  [ 'team_id' => 3, 'user_id' => 4 ],
                  [ 'team_id' => 1, 'user_id' => 13 ] ] );
  }
}