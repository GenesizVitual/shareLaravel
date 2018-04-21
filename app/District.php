<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    //
    protected $table="district";

    public function toInstance()
    {
        return $this->belongsTo('App\Instance','district_id');
    }
}
