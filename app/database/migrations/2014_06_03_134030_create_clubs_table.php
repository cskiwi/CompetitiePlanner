<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClubsTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create( 'clubs', function (Blueprint $table) {
      $table->increments( 'id' );

      $table->string( 'name', 32 );
      $table->string( 'tag', 32 );

      $table->string( 'email' )->nullable();
      $table->string( 'phone' )->nullable();

      $table->timestamps();
    } );
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::drop( 'clubs' );
  }
}
