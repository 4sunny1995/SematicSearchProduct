<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class CouponDetail extends Model
{
    use Notifiable,SoftDeletes;
    protected $fillable = [
        "id","user_id","total",'used'
    ];
    public function detail()
    {
        return $this->hasMany('App\Model\CouponDetail','coupon_id','id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
