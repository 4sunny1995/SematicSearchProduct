<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class ProductTag extends Model
{
    use Notifiable,SoftDeletes;
    protected $fillable = [
        'id','product_id','tag'
    ];
    public function product()
    {
        return $this->hasOne('App\Model\Product','id','product_id');
    }
}
