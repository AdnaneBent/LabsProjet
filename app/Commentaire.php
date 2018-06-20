<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    public function user(){
    return $this->belongsTo('App\User','users_id','id');
    }

    public function article(){
    return $this->belongsTo('App\Article','article_id','id');
    }
}
