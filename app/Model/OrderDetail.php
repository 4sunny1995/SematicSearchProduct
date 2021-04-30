<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class OrderDetail extends Model
{
    use Notifiable,SoftDeletes;
    protected $fillable = [
        'id','order_id','product_id','quantity','price','name'
    ];
    public function product()
    {
        return $this->belongsTo('App\Model\Product','product_id','id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
