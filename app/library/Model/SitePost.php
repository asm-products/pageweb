<?php

namespace PageWeb\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class SitePost extends Model
{
    public $timestamps = false;

    public $incrementing = false;

    protected $table = 'sites_posts';

    protected $fillable = [
        'id',
        'site_id',
        'title',
        'content',
        'created_at',
        'updated_at',
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
}
