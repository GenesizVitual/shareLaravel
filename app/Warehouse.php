<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    //
    protected $table='warehouse';

    protected $fillable=['goods_code','goods_name','unit','specs','brand','minimum_stock','initial_stock','standard_price','typeofgoods_id','user_id'];

    public function jenis_barang()
    {
        return $this->belongsTo('App\typeOfGoods','typeofgoods_id');
    }

}
