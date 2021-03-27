<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class RewardDetail extends Model
{
    use Notifiable,SoftDeletes;
    protected $fillable = [
        "id","user_id","type",'value','description'
    ];
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

}
