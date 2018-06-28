<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable; 

class User extends Authenticatable
{
    use Notifiable;
    use softDeletes;

    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'role',
        'address',
        'gender',
        'birth_date',
        'contact_number',
        'email',
        'username',
        'password',
        'quota'
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

    

    // public function admin()
    // {
    //     return $this->belongsTo(Admin::class, 'admin_id');
    // }
    // public function agent()
    // {
    //     return $this->belongsTo(Agent::class, 'agent_id');
    // }

     public function getFullnameAttribute()
    {
       return "{$this->firstname} {$this->middlename[0]} {$this->lastname}";
    }

    public function getFullnameAttribute()
    {
       return "{$this->firstname} {$this->middlename[0]} {$this->lastname}";
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
   
    public function scopeFieldsForMasterList($query)
    {
        return $query;
    }
}

