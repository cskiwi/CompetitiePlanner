<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTeamsTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create( 'teams', function (Blueprint $table) {
      $table->increments( 'id' );
      $table->string( 'name', 32 );

      $table->integer( 'club_id' )->unsigned()->index();
      $table->foreign( 'club_id' )->references( 'id' )->on( 'clubs' )->onDelete( 'cascade' );

      $table->timestamps();
    } );
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::drop( 'teams' );
  }
}
