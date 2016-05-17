<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPhase extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'productphases';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

}
