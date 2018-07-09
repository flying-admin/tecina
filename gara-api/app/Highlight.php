<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Highlight extends Model
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
        'image'
    ];

    public function getTranslate() {
        return $this->belongsToMany('App\Language', 'highlights_translations', 'id_highlight', 'id_language')->withPivot('name', 'description');
    }
}
