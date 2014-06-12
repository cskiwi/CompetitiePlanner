<?php

class ClubsTableSeeder extends Seeder {

  public function run() {

    Club::create( [ 'id' => 1, 'name' => 'Smash for fun', 'tag' => 'SFF', ] );
    Club::create( [ 'id' => 2, 'name' => 'Sentse Badminton Club', 'tag' => 'SenteBC', ] );
  }

}