<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shipping extends Model
{
     protected $fillable = [
        'id', 'user_id','f_name', 'l_name','company','address','house_no','phone','email',
    ];

}
