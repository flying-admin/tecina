<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drink extends Model
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
      'name', 'image', 'drink_type_id', 'price'
  ];

  public function drinkType(){
      return $this->belongsTo('App\DrinkType');
  }
  public function getTranslate() {
    return $this->belongsToMany('App\Language', 'drink_translations')->withPivot('name', 'description');
  }

}
