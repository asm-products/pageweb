<?php

namespace PageWeb\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class SiteFeed extends Model
{
    public $timestamps = false;

    public $incrementing = false;

    protected $table = 'sites_feeds';

    protected $fillable = [
        'id',
        'type',
        'site_id',
        'content',
        'photo_url',
        'link',
        'link_title',
        'link_caption',
        'link_description',
        'created_at'
    ];

    public function isLink()
    {
        return $this->type == 'link';
    }

    public function isStatus()
    {
        return $this->type == 'status';
    }

    public function isPhoto()
    {
        return $this->type == 'photo';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function site()
    {
        return $this->belongsTo('PageWeb\Model\Site', 'site_id', 'id');
    }
}
