<?php

class Club extends Eloquent {
  protected $table    = 'clubs';
  protected $fillable = [ 'name', 'tag' ];
  protected $visible  = array( 'id', 'name', 'tag' );

  public function Teams() {
    return $this->HasMany( 'Team' );
  }

  public function Users() {
    return $this->hasMany( 'User' );
  }
}