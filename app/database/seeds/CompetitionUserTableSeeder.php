<?php

class CompetitionUserTableSeeder extends Seeder {

  public function run() {
    DB::table( 'competition_user' )->insert( [

      [ 'going' => 'unknown', 'competition_id' => 5, 'user_id' => 1, ],
      [ 'going' => 'unknown', 'competition_id' => 5, 'user_id' => 2, ] ] );
  }
}