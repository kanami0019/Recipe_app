<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CookingStep extends Model
{
    public function recipe()
    {
        return $this->belongsTo('App\Recipe');
    }
}
