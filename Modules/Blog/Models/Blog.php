<?php

namespace Modules\Blog\Models;

use App\Trait\CommonModelMethodsTrait;
use App\Trait\CommonScopesTrait;
use Illuminate\Database\Eloquent\Model;
use Modules\Blog\Database\factories\BlogFactory;
use Spatie\Permission\Traits\HasRoles;

class Blog extends Model
{
    use CommonScopesTrait ,CommonModelMethodsTrait ,HasRoles;

    protected $appends = ['jalali_created_at' ];

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
