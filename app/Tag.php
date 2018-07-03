<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;
    
    public function articles(){
    return $this->belongsToMany('App\Article', 'articles_has_tags','tags_id','articles_id');
    }
}
