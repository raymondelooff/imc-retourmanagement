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
        'name', 'email', 'password', 'activated',
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
     * The model's attributes.
     *
     * @var array
     */
    protected $attributes = [
        'activated' => true
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
}
