<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    public function article(){
    return $this->hasMany('App\Article','categories_id','id');

    }
}
