<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Tag extends Model
{
    use Notifiable,SoftDeletes;
    protected $fillable = [
        'id','tag','times'
    ];
}
