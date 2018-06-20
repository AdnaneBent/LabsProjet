<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function users(){
    return $this->belongsTo('App\User','users_id','id');

    }

    public function commentaires(){
    return $this->belongsTo('App\Commentaire','articles_id','id');

    }

    public function categories(){
    return $this->belongsTo('App\categorie','categories_id','id');

    }

     public function tags(){
    return $this->belongsToMany('App\Tag', 'articles_has_tags','articles_id','tags_id');
    }

}
