<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use Notifiable,SoftDeletes;
    protected $fillable = [
        'id','code','total','user_id','status'
    ];
    public function product_detail()
    {
        return $this->hasMany('App\Model\OrderDetail','order_id','id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
