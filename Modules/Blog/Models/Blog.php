<?php

namespace Modules\Blog\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Blog\Database\factories\BlogFactory;
use Modules\Theme\Trait\CommonModelMethodsTrait;
use Modules\Theme\Trait\CommonScopesTrait;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Permission\Traits\HasRoles;

class Blog extends Model implements HasMedia
{

    use CommonScopesTrait ,CommonModelMethodsTrait ,HasRoles;

    protected $appends = ['jalali_created_at' ,'images'];

    protected $fillable = [
        'title',
        'slug',
        'summary',
        'content',
        'status',
        'chosen',
    ];

    protected static function newFactory(): BlogFactory
    {
        return BlogFactory::new();
    }

}
