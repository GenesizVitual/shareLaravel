<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fiscal_years extends Model
{
    //
    public $timestamps=false;

    protected $fillable=['years','user_id'];
}
