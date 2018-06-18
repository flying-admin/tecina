<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WineVariety extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;


    public function getTranslate() {
        return $this->belongsToMany('App\Language', 'wine_varieties_translations', 'id_wine_variety', 'id_language')->withPivot( 'name');
    }

    // A wine variety appears in many wines
    public function wineVarieties(){
        return $this->belongsToMany('App\Wine', 'wines_wine_varieties');
    }
}
