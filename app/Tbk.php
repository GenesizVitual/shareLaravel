<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tbk extends Model
{
    //
    protected $table = 'tbk';
    protected $fillable=['number_tbk','spj_id','user_id'];
}
