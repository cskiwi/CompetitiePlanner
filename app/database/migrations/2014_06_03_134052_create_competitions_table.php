<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompetitionsTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create( 'competitions', function (Blueprint $table) {
      $table->increments( 'id' );

      $table->dateTime( 'start_date' );
      $table->dateTime( 'end_date' );
      $table->boolean( 'played' )->default( 0 );

      $table->integer( 'home_team_id' )->unsigned()->index();
      $table->foreign( 'home_team_id' )->references( 'id' )->on( 'teams' )->onDelete( 'cascade' );

      $table->integer( 'guest_team_id' )->unsigned()->index();
      $table->foreign( 'guest_team_id' )->references( 'id' )->on( 'teams' )->onDelete( 'cascade' );

      $table->timestamps();
    } );
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::drop( 'competitions' );
  }
}
