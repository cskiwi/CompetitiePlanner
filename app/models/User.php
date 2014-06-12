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
    return $this->belongsToMany( 'Competition' );
  }

  public function roles() {
    return $this->belongsToMany( 'Role' );
  }

  public function permissions() {
    return $this->hasMany( 'Permission' );
  }

  public function hasRole($key) {
    foreach ($this->roles as $role) {
      if ($role->name === $key) {
        return true;
      }
    }
    return false;
  }

}
