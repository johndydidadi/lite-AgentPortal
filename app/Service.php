<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Common\HRISModel;

class Service extends HRISModel
{
    protected $fillable = [
        'service',
        'payment_type',
        'otp_price',
        'annual_price',
        'semi_quarterly_price',
        'quarterly_price',
        'monthly_price'
    ];
}
