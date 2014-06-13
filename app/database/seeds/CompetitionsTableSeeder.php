<?php

class CompetitionsTableSeeder extends Seeder {

  public function run() {

    Competition::create( [ 'start_date' => '2014-06-04 20:00:00',
                           'end_date' => '2014-06-04 22:00:00',
                           'played' => 1,
                           'home_team_id' => 1,
                           'guest_team_id' => 1 ] );

    Competition::create( [ 'start_date' => '2014-06-07 20:00:00',
                           'end_date' => '2014-06-07 22:00:00',
                           'home_team_id' => 1,
                           'guest_team_id' => 1 ] );

    Competition::create( [ 'start_date' => '2014-06-07 20:00:00',
                           'end_date' => '2014-06-07 22:00:00',
                           'home_team_id' => 2,
                           'guest_team_id' => 1 ] );

    Competition::create( [ 'start_date' => '2014-06-06 20:00:00',
                           'end_date' => '2014-06-06 22:00:00',
                           'home_team_id' => 3,
                           'guest_team_id' => 1 ] );

    Competition::create( [ 'start_date' => '2014-07-01 20:00:00',
                           'end_date' => '2014-07-01 22:00:00',
                           'home_team_id' => 1,
                           'guest_team_id' => 1 ] );
  }
}