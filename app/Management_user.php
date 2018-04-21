<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Management_user extends Model
{
    //
    protected $fillable = [
        'username', 'name', 'password','photo','instance_id','user_id'
    ];
}
