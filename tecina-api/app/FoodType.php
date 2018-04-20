<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodType extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;


    public function getTranslate() {
        return $this->belongsToMany('App\language', 'dishes_translations')->withPivot('name');
    }
}
