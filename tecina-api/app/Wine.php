<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wine extends Model
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
        'name', 'image', 'id_wine_type', 'id_do', 'year', 'province_id', 'drink_type_id', 'wine_age_id', 'wine_class_id'
    ];


    public function getTranslate() {
        return $this->belongsToMany('App\Language', 'wines_translations','id_wine', 'id_language')->withPivot( 'description');
    }

    // A Wine appears in many Menus
    public function menus(){
        return $this->belongsToMany('App\Menu', 'menus_wines');
    }

    // A Wine appears in many wine varieties
    public function wineVarieties(){
        return $this->belongsToMany('App\WineVariety', 'wines_wine_varieties', 'id_wine', 'id_wine_variety');
    }

    // A Wine has a wine type
    // public function wineType(){
    //     return $this->belongsTo('App\WineType','wine_types', 'id_wine','id_wine_type');
    // }

    // A Wine has a denomination of origin
    public function originDenomination(){
        return $this->belongsTo('App\DenominationOfOrigin');
    }
}
