<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DenominationOfOrigin extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'do';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'region'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
