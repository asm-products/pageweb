<?php

namespace PageWeb\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * @property-read Collection $photos
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class SiteAlbum extends Model
{
    protected $table = 'sites_albums';

    protected $fillable = [
        'id',
        'site_id',
        'title',
        'cover_photo',
        'type'
    ];

    public function getId()
    {
        return $this->getKey();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function site()
    {
        return $this->belongsTo('PageWeb\Model\Site', 'site_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany('PageWeb\Model\SitePhoto', 'album_id', 'id');
    }
}
