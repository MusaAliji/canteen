<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Canteen extends Model
{
    use Notifiable;

    protected $fillable = [
        'name','user_id','location','open','close'
    ];

    public function products(){
        return $this->belongsToMany(Product::class,'canteen_product')->withPivot('stock');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
