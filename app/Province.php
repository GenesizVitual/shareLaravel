<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table="province";

    public function toInstance()
    {
        return $this->belongsTo('App\Instance', 'province_id');
    }
}
