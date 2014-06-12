<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create( 'users', function (Blueprint $table) {
      $table->increments( 'id' );

      $table->string( 'name', 32 );
      $table->string( 'username', 32 );
      $table->string( 'remember_token', 100 )->nullable();
      $table->string( 'email', 320 );
      $table->string( 'password', 64 );

      $table->string( 'facebook_id' );
      $table->string( 'twitter_id' );
      $table->string( 'google_id' );

      $table->enum( 'loginMethod', [ 'facebook', 'twitter', 'google', 'link', 'normal' ] )->nullable();

      $table->char( 'single', 2 );
      $table->char( 'double', 2 );
      $table->char( 'mix', 2 );

      $table->integer( 'club_id' )->unsigned()->index()->nullable();
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
    Schema::drop( 'users' );
  }

}
