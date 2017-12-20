<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kind extends Model
{
    protected $fillable=[
        'name'
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
