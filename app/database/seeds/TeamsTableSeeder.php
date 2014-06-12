<?php

class TeamsTableSeeder extends Seeder {

  public function run() {
    Team::create( [ 'id' => 1, 'name' => 'Heren 1', 'club_id' => 1, ] );
    Team::create( [ 'id' => 2, 'name' => 'Heren 2', 'club_id' => 1, ] );
    Team::create( [ 'id' => 3, 'name' => 'Damens 1', 'club_id' => 1, ] );

    Team::create( [ 'id' => 4, 'name' => 'Gemengd 1', 'club_id' => 1, ] );
  }

}