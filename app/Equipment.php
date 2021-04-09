<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    //
    protected $fillable = [
    	'user_id', 'model','manufacture', 'photo', 'potency', 'antenna', 'description','range', 'band', 'wan', 'memory'
    ];
}
