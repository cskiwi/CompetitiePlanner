<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDetailsTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create( 'details', function (Blueprint $table) {
      $table->increments( 'id' );
      $table->enum( 'type', [ 'single', 'double' ] );

      $table->integer( 'player1_id' )->unsigned()->index();
      $table->foreign( 'player1_id' )->references( 'id' )->on( 'users' )->onDelete( 'cascade' );
      $table->integer( 'player2_id' )->unsigned()->index();
      $table->foreign( 'player2_id' )->references( 'id' )->on( 'users' )->onDelete( 'cascade' );

      $table->integer( 'player3_id' )->unsigned()->index()->nullable();
      $table->foreign( 'player3_id' )->references( 'id' )->on( 'users' )->onDelete( 'cascade' );
      $table->integer( 'player4_id' )->unsigned()->index()->nullable();
      $table->foreign( 'player4_id' )->references( 'id' )->on( 'users' )->onDelete( 'cascade' );

      $table->string( 'set1_score1' )->nullable();
      $table->string( 'set1_score2' )->nullable();

      $table->string( 'set2_score1' )->nullable();
      $table->string( 'set2_score2' )->nullable();

      $table->string( 'set3_score1' )->nullable();
      $table->string( 'set3_score2' )->nullable();

      $table->integer( 'competition_id' )->unsigned()->index();
      $table->foreign( 'competition_id' )->references( 'id' )->on( 'competitions' )->onDelete( 'cascade' );
      $table->timestamps();
    } );
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::drop( 'details' );
  }
}
