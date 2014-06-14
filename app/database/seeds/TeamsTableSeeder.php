<?php

class TeamsTableSeeder extends Seeder {

  public function run() {
    Team::create( [ 'id' => 1, 'name' => 'Smash For Fun 1D', 'club_id' => 1, ] );
    Team::create( [ 'id' => 2, 'name' => 'Smash For Fun 1G', 'club_id' => 1, ] );
    Team::create( [ 'id' => 3, 'name' => 'Smash For Fun 1H', 'club_id' => 1, ] );
    Team::create( [ 'id' => 4, 'name' => 'Smash For Fun 2H', 'club_id' => 1, ] );

    Team::create( [ 'id' => 5, 'name' => 'Sente 1G', 'club_id' => 2, ] );
    Team::create( [ 'id' => 6, 'name' => 'Sente 1H', 'club_id' => 2, ] );
    Team::create( [ 'id' => 7, 'name' => 'Sente 2H', 'club_id' => 2, ] );
  }
}