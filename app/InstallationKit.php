<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstallationKit extends Model
{
    //
    protected $fillable = [
    	'user_email', 'user_name', 'creation_date'
    ];
}
