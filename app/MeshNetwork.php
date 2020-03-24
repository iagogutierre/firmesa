<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeshNetwork extends Model
{
    //
    protected $fillable = [
    	'user_id',
    	'bssid',
    	'location',
    	'users_attended',
    	'nodes',
    	'gateway'
    ];
}
