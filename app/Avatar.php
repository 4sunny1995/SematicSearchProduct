<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Avatar extends Model
{
    use Notifiable,SoftDeletes;
    protected $fillable = [
        "id","avatar","user_id"
    ];
    public function user()
    {
        return $this->belongsTo("App\User",'user_id','id');
    }
}
