<?php

use Cartalyst\Sentry\Users\Eloquent\User as SentryUserModel;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Auth\UserInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use PageWeb\Model\Site;

/**
 * @property-read string $username
 * @property-read string $first_name
 * @property-read string $last_name
 * @property-read string $email
 * @property-read string $password
 * @property-read Site   $sites
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class User extends SentryUserModel implements UserInterface, RemindableInterface
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'reset_password_code',
        'activation_code',
        'persist_code',
    ];

    public function getName()
    {
        return sprintf('%s %s', $this->first_name, $this->last_name);
    }

    /**
     * @return bool
     */
    public function clearToken()
    {
        $this->token = null;
        $this->save();

        return true;
    }

    /**
     * Checks if a user can manage a site
     *
     * @param $siteId
     * @return bool|\Illuminate\Database\Eloquent\Model|static
     */
    public function canManageSite($siteId)
    {
        try {
            return $this->sites()->wherePivot('site_id', $siteId)->firstOrFail();
        }
        catch (ModelNotFoundException $e) {
            
        }

        return false;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function sites()
    {
        return $this->belongsToMany('PageWeb\Model\Site', 'users_sites', 'user_id', 'site_id');
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
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
