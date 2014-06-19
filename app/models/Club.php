<?php

class Club extends Eloquent {
  protected $table    = 'clubs';
  protected $fillable = [ 'name', 'tag', 'email', 'phone' ];
  protected $visible  = array( 'name', 'tag', 'email', 'phone' );

  public function Teams() {
    return $this->HasMany( 'Team' );
  }

  public function Users() {
    return $this->hasMany( 'User' );
  }
  public function admins() {
    return $this->belongsToMany( 'User', 'club_admin' );
  }
}