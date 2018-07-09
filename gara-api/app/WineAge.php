<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WineAge extends Model
{
  public function getTranslate() {
      return $this->belongsToMany('App\Language', 'wine_age_translations')->withPivot('name');
  }
}
