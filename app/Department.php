<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable=[
      'name','faculty'
    ];

    public function room(){
        return $this->hasMany(Room::class);
    }
}
