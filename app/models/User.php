<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

  use UserTrait, RemindableTrait;

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table    = 'users';
  protected $guarded  = array( 'id', 'password', 'facebook_id', 'google_id', 'twitter_id' );
  protected $fillable = array( 'first_name', 'last_name', 'email' );
  protected $visible  = array( 'id', 'name' );
  protected $hidden   = array( 'password', 'remember_token' );

  public function Club() {
    return $this->belongsTo( 'club' );
  }

  public function Teams() {
    return $this->belongsToMany( 'Team' );
  }

  public function Competitions() {
    return $this->belongsToMany( 'Competition' )->where('going', '=', 'accepted');
  }
  public function UpcomingCompetitions() {
    return $this->belongsToMany( 'Competition' )->where('going', '=', 'accepted')->where('start_date','>', ( new DateTime )->format( 'Y-m-d H:i:s' ));
  }
  public function PassedCompetitions() {
    return $this->belongsToMany( 'Competition' )->where('going', '=', 'accepted')->where('start_date','<', ( new DateTime )->format( 'Y-m-d H:i:s' ));
  }
  public function ToAcceptCompetitions() {
    return $this->belongsToMany( 'Competition' )->where('going', '=', 'unknown');
  }
  public function DeniedCompetitions() {
    return $this->belongsToMany( 'Competition' )->where('going', '=', 'denied');
  }

  public function CaptainOf() {
    return $this->belongsToMany( 'Team', 'team_captain' );
  }
  public function AdminOf() {
    return $this->belongsToMany( 'Club', 'club_admin' );
  }
}
