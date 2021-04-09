<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FirmwareInKit extends Model
{
    //
    protected $fillable = [
    	'kit_id', 'firmware_id'
    ];
}
