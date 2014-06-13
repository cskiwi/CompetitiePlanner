<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTeamCaptainTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create( 'team_captain', function (Blueprint $table) {
      $table->increments( 'id' );
      $table->integer( 'team_id' )->unsigned()->index();
      $table->foreign( 'team_id' )->references( 'id' )->on( 'teams' )->onDelete( 'cascade' );
      $table->integer( 'user_id' )->unsigned()->index();
      $table->foreign( 'user_id' )->references( 'id' )->on( 'users' )->onDelete( 'cascade' );
    } );
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::drop( 'team_captain' );
  }
}
