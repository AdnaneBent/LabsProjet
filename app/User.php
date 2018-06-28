<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
     
    public function role(){
    return $this->belongsTo('App\Role','roles_id1','id');

    }
    public function article(){
    return $this->hasMany('App\Article','users_id','id');

    }
    public function commentaire(){
    return $this->hasMany('App\Commentaire','users_id','id');

    }
}
