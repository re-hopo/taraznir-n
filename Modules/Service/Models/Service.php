<?php

namespace Modules\Service\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Service\Database\factories\ServiceFactory;
use Modules\Theme\Trait\CommonModelMethodsTrait;
use Modules\Theme\Trait\CommonScopesTrait;
use Spatie\MediaLibrary\HasMedia;

class Service extends Model implements HasMedia
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

    protected static function newFactory(): ServiceFactory
    {
        return ServiceFactory::new();

    }
}
