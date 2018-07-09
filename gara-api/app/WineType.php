<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WineType extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;


    public function getTranslate() {
        return $this->belongsToMany('App\Language', 'wine_type_translations', 'id_wine_type', 'id_language')->withPivot( 'name');
    }

    // A wine type has many wines
    public function wines(){
        return $this->hasMany('App\Wine');
    }
}
