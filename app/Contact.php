<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $fillable = [
        'address','country','phone','email', 'facebook','instagram','twitter','youtube', 'img', 
    ];
}
