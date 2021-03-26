<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class CouponDetail extends Model
{
    use Notifiable,SoftDeletes;
    protected $fillable = [
        "id","user_id","coupon_id","code"
    ];
    public function coupon()
    {
        return $this->belongsTo('App\Model\Coupon','coupon_id','id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
