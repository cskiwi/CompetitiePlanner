<?php

class TeamUserTableSeeder extends Seeder {

  public function run() {
    DB::table( 'team_user' )
      ->insert( [ [ 'team_id' => 1, 'user_id' => 10, ], // damens 1
                  [ 'team_id' => 1, 'user_id' => 11, ],
                  [ 'team_id' => 1, 'user_id' => 12, ],
                  [ 'team_id' => 1, 'user_id' => 13, ],
                  [ 'team_id' => 2, 'user_id' => 10, ], // gemengd 1
                  [ 'team_id' => 2, 'user_id' => 12, ],
                  [ 'team_id' => 2, 'user_id' => 5, ],
                  [ 'team_id' => 2, 'user_id' => 2, ],
                  [ 'team_id' => 3, 'user_id' => 8, ], // here 1
                  [ 'team_id' => 3, 'user_id' => 4, ],
                  [ 'team_id' => 3, 'user_id' => 5, ],
                  [ 'team_id' => 3, 'user_id' => 2, ],
                  [ 'team_id' => 4, 'user_id' => 3, ], // Heren 2
                  [ 'team_id' => 4, 'user_id' => 6, ],
                  [ 'team_id' => 4, 'user_id' => 7, ],
                  [ 'team_id' => 4, 'user_id' => 9, ],

                  [ 'team_id' => 6, 'user_id' => 1, ],
                  [ 'team_id' => 6, 'user_id' => 14, ],


      ] );
  }
}