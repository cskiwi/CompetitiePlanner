<?php

class DatabaseSeeder extends Seeder {

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    Eloquent::unguard();

    $this->call( 'ClubsTableSeeder' );
    $this->call( 'UsersTableSeeder' );
    $this->call( 'TeamsTableSeeder' );

    $this->call( 'TeamUserTableSeeder' );
    $this->call( 'TeamCaptainTableSeeder' );

    $this->call( 'CompetitionsTableSeeder' );
    // $this->call( 'DetailsTableSeeder' );
    $this->call( 'ClubAdminTableSeeder' );


    // $this->call( 'ClubAdminTableSeeder' );
  }
}
