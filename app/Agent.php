<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Common\HRISModel;

class Agent extends HRISModel
{
    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'address',
        'gender',
        'birth_date',
        'contact_number',
        'email',
        'quota'
    ];

    protected $appends = [
        'fullname'
    ];
    
    public function getFullnameAttribute()
    {
       return "{$this->firstname} {$this->middlename[0]} {$this->lastname}";
    }

    public function user()
    {
        return $this->hasOne(User::class, 'agent_id');
    }
}
