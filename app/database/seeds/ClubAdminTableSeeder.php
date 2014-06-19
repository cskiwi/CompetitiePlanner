<?php

class ClubAdminTableSeeder extends Seeder {

  public function run() {
    DB::table( 'club_admin' )
      ->insert( [
                  [
                    'club_id' => 1,
                    'user_id' => 1
                  ],
                  [
                    'club_id' => 2,
                    'user_id' => 1
                  ],
                ] );
  }
}