<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Common\HRISModel;

class Client extends HRISModel
{
    protected $fillable = [
        'company',
        'representative',
        'contact_number',
        'address',
        'nature_of_business',
        'service'
    ];
}
