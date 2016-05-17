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
    protected $fillable = ['name', 'description', 'short_description', 'ean_code', 'serial_number', 'invoice_number', 'weight', 'country_code', 'location', 'retailer_id', 'quality_label', 'productphase_id', 'problem_description', 'color', 'msrp'];

    /**
     * Returns the retailer associated with the user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function retailer()
    {
        return $this->hasOne('App\Retailer', 'id', 'retailer_id');
    }

    /**
     * Defines relations with a ProductPhase object
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product_phases()
    {
        return $this->hasOne('App\ProductPhase', 'id', 'productphase_id');
    }
}
