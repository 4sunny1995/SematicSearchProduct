<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{
    use Notifiable,SoftDeletes;
    protected $fillable = [
        "id",'title','content','image','user_id'
    ];
    public function comments()
    {
        return $this->hasMany('App\Model\Comment','post_id','id');
    }
    public function likes()
    {
        return $this->hasMany('App\Model\Like','post_id','id');
    }
    public function vendor()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
    public function avatar()
    {
        return $this->hasOne('App\Avatar','id','user_id');
    }
}
