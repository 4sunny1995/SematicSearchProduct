<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Information extends Model
{
    use Notifiable,SoftDeletes;
    protected $fillable = [
        "id","user_id","phone",'address','gender','dateOfBirth','description'
    ];
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
