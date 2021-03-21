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
        "id",'title','content','image'
    ];
    public function comments()
    {
        return $this->belongsTo('App\Model\Comment');
    }
    public function likes()
    {
        return $this->belongsTo('App\Model\Like');
    }
}
