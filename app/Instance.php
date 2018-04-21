<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instance extends Model
{
    protected $table="instance";

    protected $fillable=['province_id','district_id','instance','alamat','no_telp','fax','logo','user_id'];

    public $timestamps =false;

    public function getProvince()
    {
        return $this->hasOne('App\Province','id');
    }

    public function getDistrict()
    {
        return $this->hasOne('App\District', 'id');
    }
}
