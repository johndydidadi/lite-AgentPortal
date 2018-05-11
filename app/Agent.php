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
}
