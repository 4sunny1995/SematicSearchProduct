<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Comment extends Model
{
    use Notifiable;
    protected $fillable = [
        'id','post_id','user_id','content'
    ];
    public function avatar()
    {
        return $this->hasOne('App\Avatar','id','user_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
