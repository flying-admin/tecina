<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
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
        'ingredients'
    ];


    public function getTranslate() {
        return $this->belongsToMany('App\Language', 'dishes_translations')->withPivot('name', 'description');
    }


    // A Dish appears in many allergens
    public function allergens(){
        return $this->belongsToMany('App\Allergen', 'allergens_dishes');
    }

    // A Dish appears in many menus
    public function menus(){
        return $this->belongsToMany('App\Menu', 'dishes_menus');
    }

    // A Dish appears in many food types
    public function foodTypes(){
        return $this->belongsToMany('App\FoodType', 'dishes_food_types');
    }

    // A Dish appears in many categories
    public function categories(){
        return $this->belongsToMany('App\Category', 'categories_dishes');
    }

    // A Dish has many images
    public function images(){
        return $this->hasMany('App\Image');
    }

}
