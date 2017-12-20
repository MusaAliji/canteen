<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use Notifiable;

    protected $fillable=[
        'name','price','kinds_id','stock','image'
    ];

    public function kind(){
        return $this->belongsTo(Kind::class);
    }

    public function canteen(){
        return $this->belongsToMany(Canteen::class,'canteen_product')->withTimestamps();
    }

    public function order(){
        return $this->hasMany(Order::class);
    }
}
