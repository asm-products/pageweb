<?php

namespace PageWeb\Model;

use Illuminate\Database\Eloquent\Model;

class ThemeCategory extends Model
{
    /**
     * Table
     *
     * @var string
     */
    protected $table = 'themes_categories';

    protected $fillable = [
        'name'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function themes()
    {
        return $this->hasMany('PageWeb\Model\Theme', 'category_id');
    }
}
