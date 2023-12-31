<?php

namespace Modules\News\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\News\Database\factories\NewsFactory;
use Modules\Theme\Trait\CommonModelMethodsTrait;
use Modules\Theme\Trait\CommonScopesTrait;
use Spatie\MediaLibrary\HasMedia;

class News extends Model implements HasMedia
{
    use CommonScopesTrait ,CommonModelMethodsTrait;

    protected $appends = ['images'];

    protected $fillable = [
        'title',
        'slug',
        'summary',
        'content',
        'cover',
        'thumbnail',
        'status',
        'chosen',
    ];

    protected static function newFactory(): NewsFactory
    {
        return NewsFactory::new();
    }

}
