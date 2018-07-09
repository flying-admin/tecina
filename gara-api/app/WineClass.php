<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WineClass extends Model
{
  public function getTranslate() {
      return $this->belongsToMany('App\Language', 'wine_class_translations')->withPivot('name');
  }
}
