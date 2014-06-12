<?php

class Competition extends Eloquent {
  protected $table    = 'competitions';
  protected $fillable = [ 'start_date', 'end_date', 'team_id' ];

  public function Details() {
    return $this->hasMany( 'Detail' );
  }

  public function Team() {
    return $this->BelongsTo( 'Team' );
  }

  public function Users() {
    return $this->belongsToMany( 'User' );
  }

  public static function create(array $attributes) {
    $comp = parent::create( $attributes );

    foreach ($comp->team->users as $user) {
      $comp->users()->attach( $user );
    }
  }
}