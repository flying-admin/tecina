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
        return $this->belongsToMany('App\language', 'categories_translations')->withPivot('name', 'description');
    }
}
