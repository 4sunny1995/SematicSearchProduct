<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Like extends Model
{
    use Notifiable,SoftDeletes;
    protected $fillable = [
        'id','post_id','user_id'
    ];
}
