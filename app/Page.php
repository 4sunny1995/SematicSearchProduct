<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Page extends Model
{
    use Notifiable;
    protected $fillable = [
        "id","url","title","content","isCrawled",'status'
    ];
}
