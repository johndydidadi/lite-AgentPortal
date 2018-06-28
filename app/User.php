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
        'admin_id',
        'agent_id',
        'role',
        'username',
        'password',
        'email'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'password',
        'remember_token',
    ];

    

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
    public function agent()
    {
        return $this->belongsTo(Agent::class, 'agent_id');
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

