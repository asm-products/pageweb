<?php

namespace PageWeb\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class SiteEvent extends Model
{
    protected $table = 'sites_events';

    protected $fillable = [
        'id',
        'site_id',
        'title',
        'start_time',
        'end_time',
        'description',
        'photo'
    ];

    public $timestamps = false;

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
}
