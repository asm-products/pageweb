<?php

namespace PageWeb\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * @property-read Collection $album
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class SitePhoto extends Model
{
    public $timestamps = false;

    /**
     * @var string
     */
    protected $table = 'sites_photos';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'album_id',
        'site_id',
        'caption',
        'url',
        'type',
        'created_at'
    ];

    /**
     * @return mixed
     */
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function album()
    {
        return $this->belongsTo('PageWeb\Model\SiteAlbum', 'album_id', 'id');
    }

    public function isCoverPhoto()
    {
        return $this->type == 'cover';
    }
}
