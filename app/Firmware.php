<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Firmware extends Model
{
    //
     protected $fillable = [
        'user_id', 'name', 'equipment_id', 'version','description', 
        'ip','config_interface','path_to_firmware'
	    ];
	 use Searchable;
	 public function searchableAs()
     {
        return 'posts_index';
     }
}
