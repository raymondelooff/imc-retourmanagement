<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'productcategories';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['category', 'productstatus', 'productorigin'];

    /**
     * Creates list of all productcategories
     *
     * @return Array
     */
    public function getProductCategoryList()
    {
        $categories = lists('category', 'id', 'productstatus', 'productorigin');
        return $categories;
    }

}
