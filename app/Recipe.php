<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
   public function ingredients()
   {
        return $this->hasMany('App\Ingredient');
   }

   public function cooking_steps()
   {
        return $this->hasMany('App\CookingStep');
   }
}
