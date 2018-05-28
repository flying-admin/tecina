<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allergen extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'icon'
    ];


    public function getTranslate() {
        return $this->belongsToMany('App\Language', 'allergens_translations','id_allergen', 'id_language')->withPivot('name', 'description');
    }


    // A Allergen appears in many dishes
    public function dishes(){
        return $this->belongsToMany('App\Dish', 'allergens_dishes');
    }

}
