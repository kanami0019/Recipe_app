<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cooking_Step extends Model
{
    public function recipe()
    {
        return $this->belongsTo('App\Recipe');
    }
}
