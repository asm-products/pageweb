<?php

namespace PageWeb\Model;

use Illuminate\Database\Eloquent\Model;
use URL;

class Theme extends Model
{
    protected $table = 'themes';

    /**
     * Fillable attributes
     */
    protected $fillable = array('name', 'description', 'category_id');

    protected $appends = ['preview'];

    public function getId()
    {
        return $this->getKey();
    }

    /**
     * Gets this theme category name
     *
     * @return null
     */
    public function getCategoryName()
    {
        return $this->category ? $this->category->name : null;
    }

    /**
     * Gets theme config
     */
    public function config()
    {
        return (array) require public_path('/themes/' . $this->name . '/config.php');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sites()
    {
        return $this->hasMany('PageWeb\Model\Site', 'theme_id', 'id');
    }

    /**
     * @return object
     */
    public function getPreviewAttribute()
    {
        return (object) [
            'thumb' => URL::to('themes/' . $this->name . '/preview/thumb.png'),
            'large' => URL::to('themes/' . $this->name . '/preview/large.png')
        ];
    }

    /**
     * Theme Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('PageWeb\Model\ThemeCategory', 'category_id');
    }
}
