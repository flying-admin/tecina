<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DrinkType extends Model
{
    function getTranslate(){
      return $this->belongsToMany('App\Language', 'drink_type_translations')->withPivot('name', 'description');
    }
}
