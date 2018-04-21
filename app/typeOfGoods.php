<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class typeOfGoods extends Model
{
    //

    protected $table = "typeofgoods";

    public $timestamps =false;

    protected $fillable= ['typeOfGoods','user_id'];

    public function gudang()
    {
        return $this->hasOne('App\warehouse','typeofgoods_id');
    }
}
