<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
		 protected $fillable = [
    	'p_id','quantity','device','visitor_id',

    ];

        function product(){
    	return $this->belongsTo('App\product','p_id');
    }
}
