<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use Notifiable,SoftDeletes;
    protected $fillable = [
        "name",'price','url','image','hasTag','content','category','category_parent_id'
    ];
}
