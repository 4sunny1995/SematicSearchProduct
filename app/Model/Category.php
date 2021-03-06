<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{
    use Notifiable,SoftDeletes;
    
    protected $fillable = [
        "id","name","code",'category_parent_id'
    ];
}
