<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
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
     * Checks if the user is an admin or not.
     *
     * @param \App\User $user
     * @return bool
     */
    public static function isAdmin($user)
    {
        $user_role = UserRole::find($user->getAttribute('user_role'));

        if($user_role->alias == 'admin') {
            return true;
        }

        return false;
    }

    /**
     * Checks if the user is a retailer or not.
     *
     * @param \App\User $user
     * @return bool
     */
    public static function isRetailer($user)
    {
        $user_role = UserRole::find($user->getAttribute('user_role'));

        if($user_role->alias == 'retailer') {
            return true;
        }

        return false;
    }
}
