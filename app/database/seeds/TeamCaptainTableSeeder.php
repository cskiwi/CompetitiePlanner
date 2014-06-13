<?php

class TeamCaptainTableSeeder extends Seeder {

  public function run() {
    DB::table( 'team_captain' )
      ->insert( [ [ 'team_id' => 1, 'user_id' => 1, ] ] );
  }
}