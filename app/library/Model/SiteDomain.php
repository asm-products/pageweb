<?php

namespace PageWeb\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class SiteDomain extends Model
{
    protected $table = 'sites_domains';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function site()
    {
        return $this->belongsTo('PageWeb\Model\Site', 'site_id', 'id');
    }
}
