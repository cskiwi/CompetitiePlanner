<?php

class DetailsTableSeeder extends Seeder {

  public function run() {
    Detail::create( [ 'id' => 1,
                      'type' => 'single',
                      'player1_id' => 1,
                      'player2_id' => 2,
                      'set1_score1' => '21',
                      'set1_score2' => '17',
                      'set2_score1' => '22',
                      'set2_score2' => '24',
                      'set3_score1' => '21',
                      'set3_score2' => '19',
                      'competition_id' => 1, ] );
    Detail::create( [ 'id' => 2,
                      'type' => 'double',
                      'player1_id' => 1,
                      'player2_id' => 2,
                      'player3_id' => 1,
                      'player4_id' => 2,
                      'set1_score1' => '15',
                      'set1_score2' => '21',
                      'set2_score1' => '17',
                      'set2_score2' => '21',
                      'competition_id' => 1, ] );
  }
}