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
}
