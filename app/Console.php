<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Console extends Model
{
    protected $table="consoles";

    protected $fillable=[
        'id', 
        'console',
        'slug',
    ];

    public $timestamps = false;
}
