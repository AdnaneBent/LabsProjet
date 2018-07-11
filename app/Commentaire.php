<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commentaire extends Model
{
    use SoftDeletes;

    public function user(){
    return $this->belongsTo('App\User','users_id','id');
    }

    public function article(){
    return $this->belongsTo('App\Article','articles_id','id');
    }
}
