<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompetitionUserTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create( 'competition_user', function (Blueprint $table) {
      $table->increments( 'id' );
      $table->enum( 'going', [ 'unknown', 'accepted', 'denied' ] )->default( 'accepted' );
      $table->integer( 'competition_id' )->unsigned()->index();
      $table->foreign( 'competition_id' )->references( 'id' )->on( 'competitions' )->onDelete( 'cascade' );
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
    Schema::drop( 'competition_user' );
  }
}
