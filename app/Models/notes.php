<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notes extends Model
{
    protected $guarded = ['mana'];


    public function presents ()
    {
        return $this->hasMany('App\Models\presents');
    }

}
