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
        'name', 'email', 'password', 'role_id', 'photo_id', 'is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    //Setting up relation with roles table
    public function role() {
        return $this->belongsTo('App\Role');
    }

    //Setting up relation with photos table
    public function photo() {
        return $this->belongsTo('App\Photo');
    }

    //Conditions check method for use in Admin middleware
    public function isAdmin() {
        if ($this->role->name == 'administrator' && $this->is_active == 1) {
            return true;
        }
        return false;
    }

    public function posts() {
        return $this->belongsTo('App\Post');
    }
}
