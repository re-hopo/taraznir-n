<?php

namespace Modules\Standard\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Standard\Database\factories\StandardFactory;
use Modules\Theme\Trait\CommonModelMethodsTrait;
use Modules\Theme\Trait\CommonScopesTrait;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Permission\Traits\HasRoles;

class Standard extends Model implements HasMedia
{
    use CommonScopesTrait ,CommonModelMethodsTrait ,HasRoles;

    protected $appends = ['images'];

    protected $fillable = [
        'title',
        'slug',
        'tag',
        'content',
        'cover',
        'thumbnail',
        'status',
        'chosen',
    ];

    protected static function newFactory(): StandardFactory
    {
        return StandardFactory::new();
    }

}
