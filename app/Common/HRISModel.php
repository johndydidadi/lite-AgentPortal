<?php

namespace App\Common;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HRISModel extends Model
{
    use SoftDeletes;

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function scopeFieldsForMasterList($query)
    {
        return $query;
    }
}
