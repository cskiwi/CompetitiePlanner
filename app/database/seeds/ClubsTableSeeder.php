<?php

class ClubsTableSeeder extends Seeder {

  public function run() {

    Club::create( [ 'id' => 1,
                    'name' => 'Smash for fun',
                    'tag' => 'SFF',
                    'email' => 'erik.v@smashforfun.be',
                    'phone' => '09 / 378 25 55' ] );
    Club::create( [ 'id' => 2,
                    'name' => 'Sentse Badminton Club',
                    'tag' => 'SenteBC',
                    'email' => 'voorzitter@sentsebadminton.be' ] );
  }
}