<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Firmware extends Model
{
    //
     protected $fillable = [
        'user_id', 'version','model', 'manufacture','logo', 'potency','antenna', 
        'range','band','wan','memory','ip','config_interface','path_to_firmware',"path_to_logo"
	    ];
	 use Searchable;
	 public function searchableAs()
     {
        return 'posts_index';
     }
}
