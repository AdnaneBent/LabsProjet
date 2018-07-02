<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function user(){
    return $this->belongsTo('App\User','users_id','id');

    }

    public function commentaires(){
    return $this->belongsTo('App\Commentaire','articles_id','id');

    }

    public function categorie(){
    return $this->belongsTo('App\Categorie','categories_id','id');

    }

     public function tags(){
    return $this->belongsToMany('App\Tag', 'articles_has_tags','articles_id','tags_id');
    }

}
