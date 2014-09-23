<?php

namespace PageWeb\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class SiteOption extends Model
{
    public $timestamps = false;

    public $incrementing = false;

    protected $table = 'sites_options';

    protected $fillable = [
        'site_id',
        'option',
        'value'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function site()
    {
        return $this->belongsTo('PageWeb\Model\Site', 'site_id', 'id');
    }
}
