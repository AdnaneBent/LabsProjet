<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    public function testimonial(){
    return $this->hasMany('App\Testimonial','clients_id','id');

    }
}
