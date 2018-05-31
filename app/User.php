<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable; 

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'role',
        'username',
        'email',
        'password',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'password',
        'remember_token',
    ];

    protected $appends = [
        'fullname'
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function getFullnameAttribute()
    {
       return "{$this->firstname} {$this->middlename[0]} {$this->lastname}";
    }
    
        public function scopeFieldsForMasterList($query)
    {
        return $query;
    }
}

