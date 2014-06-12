<?php

class TeamUserTableSeeder extends Seeder {

  public function run() {
    DB::table( 'team_user' )
      ->insert( [ [ 'team_id' => 1, 'user_id' => 1, ], [ 'team_id' => 4, 'user_id' => 1, ], [ 'team_id' => 4, 'user_id' => 2, ] ] );
  }

}