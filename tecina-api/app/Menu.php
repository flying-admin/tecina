<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
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
        'image','pairing_included','active'
    ];


    public function getTranslate() {
        return $this->belongsToMany('App\Language', 'menus_translations', 'id_menu', 'id_language')->withPivot('name','description');
    }

    // A Menu appears in many Dishes
    public function dishes(){
        //return $this->belongsToMany('App\Dish', 'dishes_menus','id_menu','id_dish')->withPivot('order')->orderBy('order', 'asc');
        return $this->belongsToMany('App\Dish', 'dishes_menus','id_menu','id_dish');
    }


    // A Menu appears in many Wines
    public function wines(){
        return $this->belongsToMany('App\Wine', 'menus_wines','id_menu','id_wine');
    }
}
