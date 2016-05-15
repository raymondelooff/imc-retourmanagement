<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Retailer extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'retailers';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Enable soft deleting for this model
     *
     * @var string
     */
    protected $dates = ['deleted_at'];

    /**
     * Get the users of the retailer.
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }

}
