<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class CrawlerHistory extends Model
{
    use Notifiable,SoftDeletes;
    
    protected $fillable = [
        "id","domain","url","listProduct","nameProduct","priceProduct","imageProduct","hasTag","category",
    ];
}
