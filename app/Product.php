<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'short_description', 'ean_code', 'serial_number', 'invoice_number', 'weight', 'country_code', 'location', 'supplier', 'quality_label', 'status', 'problem_description', 'color', 'msrp'];

}
