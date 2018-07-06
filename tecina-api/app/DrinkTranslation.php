<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DrinkTranslation extends Model
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
      'drink_id', 'language_id', 'name', 'description'
  ];

  public function drinkType(){
      return $this->belongsTo('App\DrinkType');
  }
}
