<?php

namespace Modules\Tutorial\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Theme\Trait\CommonModelMethodsTrait;
use Modules\Theme\Trait\CommonScopesTrait;
use Modules\Tutorial\Database\factories\TutorialFactory;

class Tutorial extends Model
{
    use CommonScopesTrait ,CommonModelMethodsTrait;

    protected $appends = ['jalali_created_at' ,'images'];

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

    protected static function newFactory(): TutorialFactory
    {
        return TutorialFactory::new();
    }

}
