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
        return $this->belongsToMany('App\Language', 'dishes_translations')->withPivot('name');
    }


    // A food type appears in many dishes
    public function dishes(){
        return $this->belongsToMany('App\Dish', 'dishes_food_types');
    }
}
