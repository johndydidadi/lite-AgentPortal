<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientService extends Model
{
        protected $fillable = [
        'client_id',
        'service_id'
    ];

    public function service()
    {
        return $this->belongsTo('App\Service','service_id');
    }

    public function client()
    {
        return $this->belongsTo('App\Service','client_id');
    }
}
