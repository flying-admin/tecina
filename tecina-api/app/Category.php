<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function getTranslate() {
        return $this->belongsToMany('App\Language', 'categories_translations')->withPivot('name', 'description');
    }


    // A category appears in many dishes
    public function dishes(){
        return $this->belongsToMany('App\Dish', 'categories_dishes');
    }
}
