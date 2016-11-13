<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','verified','token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	public static function boot(){
		parent::boot();

		static::creating(function($user){
			$user->token=str_random(30);
		});
	}

	/**
	 * @param $password
	 */
	public function setPasswordAttribute($password){
		$this->attributes['password']= bcrypt($password);
	}

	/**
	 * Confirm email after registration.
	 */
	public function confirmEmail(){
		$this->verified = true;
		$this->token = null;
		$this->save();
	}
}
