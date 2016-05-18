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
        'name', 'email', 'password', 'user_role', 'retailer_id', 'activated', 'verified'
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
     * Returns the user role associated with the user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function role()
    {
        return $this->hasOne('App\UserRole', 'alias', 'user_role');
    }

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
        $this->attributes['password'] = $password;
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
     * Setter for setting the verified attribute on the user.
     *
     * @param $activated
     */
    public function setVerifiedAttribute($activated)
    {
        $this->attributes['verified'] = $activated;
    }

    /**
     * Checks if the user has the given role.
     *
     * @param $role
     * @return bool
     */
    public function hasRole($role)
    {
        if(!is_null($this->role) && $this->role->alias == $role) {
            return true;
        }

        return false;
    }

    /**
     * Checks if the user is an admin or not.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->hasRole('admin');
    }

    /**
     * Checks if the user is a retailer or not.
     *
     * @return bool
     */
    public function isRetailer()
    {
        return $this->hasRole('retailer');
    }
}
