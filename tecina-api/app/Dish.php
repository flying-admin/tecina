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
        'ingredients', 'image'
    ];


    // A Dish appears in many translates
    public function getTranslate() {
		return $this->belongsToMany('App\Language', 'dishes_translations','id_dish','id_language')->withPivot('name', 'description');
    }

    // A Dish appears in many allergens
    public function allergens(){
        return $this->belongsToMany('App\Allergen', 'allergens_dishes', 'id_dish', 'id_allergen');
    }

    // A Dish appears in many menus
    public function menus(){
        return $this->belongsToMany('App\Menu', 'dishes_menus');
    }

    // A Dish appears in many food types
    public function foodTypes(){
        return $this->belongsToMany('App\FoodType', 'dishes_food_types', 'id_dish', 'id_food_type');
    }

    // A Dish appears in many categories
    public function categories(){
        return $this->belongsToMany('App\Category', 'categories_dishes', 'id_dish', 'id_category');
    }

    // A Dish has many images
    public function images(){
        return $this->hasMany('App\Image', 'id_dish');
    }

}
