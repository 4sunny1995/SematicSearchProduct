<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Coupon extends Model
{
    use Notifiable,SoftDeletes;
    protected $fillable = [
        "id","count","total",'code','type'
    ];
    public function history()
    {
        return $this->hasMany('App\Model\CouponDetail','coupon_id','id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
