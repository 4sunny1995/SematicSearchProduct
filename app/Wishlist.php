<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Wishlist extends Model
{
    use Notifiable,SoftDeletes;
    protected $fillable = [
        'id','user_id','product_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
    public function product()
    {
        return $this->belongsTo('App\Model\Product','product_id','id');
    }
}
