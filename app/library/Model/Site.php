<?php

namespace PageWeb\Model;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read Collection $users
 * @property-read Collection $albums
 * @property-read Collection $photos
 * @property-read Collection $posts
 * @property-read Collection $feeds
 * @property-read Collection $events
 * @property-read Collection $options
 * @property-read Theme      $theme
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class Site extends Model
{
    protected $table = 'sites';

    protected $fillable = [
        'id',
        'name',
        'subdomain',
        'title',
        'phone',
        'email',
        'address',
        'photo',
        'about',
        'description',
        'token',
        'is_published',
        'theme_id'
    ];

    protected $hidden = [
        'token'
    ];

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->getKey();
    }

    public function isPublished()
    {
        return (bool) $this->is_published;
    }

    /**
     * Publish this site.
     * Note: do not call this method directly.
     * Use the SiteRepository::publish()
     *
     * @param $flag
     * @return bool
     */
    public function publish($flag)
    {
        $this->is_published = $flag;

        return $this->save();
    }

    /**
     * @return bool
     */
    public function isSubscribed()
    {
        if (!$this->subscription) {
            return false;
        }

        return $this->subscription->subscribed();
    }

    /**
     * Gets a site option
     *
     * @param string $option
     * @param null $default
     * @return null
     */
    public function getOption($option, $default = null)
    {
        if ($option = $this->options()->where('option', $option)->first()) {
            return $option['value'];
        }

        return $default;
    }

    /**
     * Sets site theme
     *
     * @param Theme $theme
     * @return bool
     */
    public function setTheme(Theme $theme)
    {
        $this->theme_id = $theme->getId();

        return $this->save();
    }

    /**
     * @return mixed
     */
    public function getCustomDomain()
    {
        if ($this->domain) {
            return $this->domain->domain;
        }

        return null;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function domain()
    {
        return $this->belongsTo('PageWeb\Model\SiteDomain', 'id', 'site_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function options()
    {
        return $this->hasMany('PageWeb\Model\SiteOption', 'site_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('User', 'users_sites', 'site_id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function albums()
    {
        return $this->hasMany('PageWeb\Model\SiteAlbum', 'site_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany('PageWeb\Model\SitePhoto', 'site_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany('PageWeb\Model\SitePost', 'site_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function feeds()
    {
        return $this->hasMany('PageWeb\Model\SiteFeed', 'site_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function events()
    {
        return $this->hasMany('PageWeb\Model\SiteEvent', 'site_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function theme()
    {
        return $this->belongsTo('PageWeb\Model\Theme', 'theme_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function subscription()
    {
        return $this->hasOne('PageWeb\Model\Subscription', 'site_id', 'id');
    }

    /**
     * Workaround for big integers
     *
     * @Override
     * @param Builder $query
     * @param array $attributes
     */
    protected function insertAndSetId(Builder $query, $attributes)
    {
        $this->insertGetId($attributes, $keyName = $this->getKeyName());
        $this->setAttribute($keyName, $this->getAttribute('id'));
    }
}
