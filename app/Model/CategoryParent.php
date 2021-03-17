<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class CategoryParent extends Model
{
    use Notifiable,SoftDeletes;
    
    protected $fillable = [
        "id","name","code"
    ];
}
