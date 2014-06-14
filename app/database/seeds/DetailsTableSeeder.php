<?php

class DetailsTableSeeder extends Seeder {

  public function run() {
    Detail::create( [ 'id' => 1,
                      'type' => 'single',
                      'player1_id' => 1,
                      'player2_id' => 7,
                      'set1_score1' => '21',
                      'set1_score2' => '17',
                      'set2_score1' => '25',
                      'set2_score2' => '23',
                      'set3_score1' => '21',
                      'set3_score2' => '19',
                      'competition_id' => 2 ] );

    Detail::create( [ 'id' => 2,
                      'type' => 'double',
                      'player1_id' => 1,
                      'player2_id' => 14,
                      'player3_id' => 7,
                      'player4_id' => 8,
                      'set1_score1' => '21',
                      'set1_score2' => '15',
                      'set2_score1' => '21',
                      'set2_score2' => '17',
                      'competition_id' => 2 ] );
  }
}