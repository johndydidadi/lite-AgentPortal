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
        'services'
    ];

    public function clientService()
    {
    	return $this->hasMany('App\ClientService', 'client_id');
    }
}
