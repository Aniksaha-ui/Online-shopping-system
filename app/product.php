<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    	 protected $fillable = [
        'id', 'p_name','slug', 'p_price','p_quan','p_alert','p_image','p_des','p_summary',
    ];

}
