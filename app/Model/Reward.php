<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Reward extends Model
{
    use Notifiable,SoftDeletes;
    protected $fillable = [
        "id","user_id","total",'used'
    ];
    public function history()
    {
        return $this->hasMany('App\Model\RewardDetail','reward_id','id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
