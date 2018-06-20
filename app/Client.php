<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function testimonial(){
    return $this->hasMany('App\Testimonial','clients_id','id');

    }
}
