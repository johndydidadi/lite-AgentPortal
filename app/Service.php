<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Common\HRISModel;

class Service extends HRISModel
{
    protected $fillable = [
        'service',
        'price'
    ];
}
