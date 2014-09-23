<?php

use Cartalyst\Sentry\Users\Eloquent\User as SentryUserModel;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Auth\UserInterface;

class Admin extends SentryUserModel implements UserInterface, RemindableInterface
{

    public static $rules = array();
    protected $table = 'admins';
    protected $guarded = array();
    protected $fillable = array();

    /**
     * sentry methods
     */
    public function groups()
    {
        return $this->belongsToMany('Cartalyst\Sentry\Groups\Eloquent\Group', 'admins_groups');
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getReminderEmail()
    {
        return $this->email;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

}
