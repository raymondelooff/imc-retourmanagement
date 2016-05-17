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

    /**
     * Defines a OneToMany relation with Product
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function product()
    {
        return $this->hasMany('App\Product');
    }

    /**
     * Setters for setting the name attribute on the product phase.
     *
     * @param $name
     */
    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
    }
}
