<?php

use
  Illuminate\Database\Migrations\Migration;
use
  Illuminate\Database\Schema\Blueprint;

class CreateClubAdminTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create(
      'club_admin',
      function (Blueprint $table) {
        $table->increments( 'id' );
        $table->integer( 'club_id' )->unsigned()->index();
        $table->foreign( 'club_id' )->references( 'id' )->on( 'clubs' )->onDelete( 'cascade' );
        $table->integer( 'user_id' )->unsigned()->index();
        $table->foreign( 'user_id' )->references( 'id' )->on( 'users' )->onDelete( 'cascade' );
      }
    );
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::drop( 'club_admin' );
  }
}
