<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_role', 'activated',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Setters for setting the name attribute on the user.
     *
     * @param $name
     */
    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
    }

    /**
     * Setters for setting the email attribute on the user.
     *
     * @param $email
     */
    public function setEmailAttribute($email)
    {
        $this->attributes['email'] = $email;
    }

    /**
     * Setter for setting the encryption on the user password.
     *
     * @param $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * Setter for setting the activated attribute on the user.
     *
     * @param $activated
     */
    public function setActivatedAttribute($activated)
    {
        $this->attributes['activated'] = $activated;
    }

    /**
     * Setter for setting the retailer_id attribute on the user.
     *
     * @param $retailer_id
     */
    public function setRetailerIdAttribute($retailer_id)
    {
        $this->attributes['retailer_id'] = $retailer_id;
    }

    /**
     * Checks if the user is an admin or not.
     *
     * @return bool
     */
    public function isAdmin()
    {
        if(!is_null($this->user_role) && $this->user_role == 'admin') {
            return true;
        }

        return false;
    }

    /**
     * Checks if the user is a retailer or not.
     *
     * @return bool
     */
    public function isRetailer()
    {
        if(!is_null($this->user_role) && $this->user_role == 'retailer') {
            return true;
        }

        return false;
    }

    /**
     * Returns the retailer associated with the user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function retailer()
    {
        if(!is_null($this->user_role) && $this->user_role == 'retailer') {
            return $this->hasOne('App\Retailer');
        }
    }
}
