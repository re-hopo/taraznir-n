<?php

namespace Modules\Tutorial\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Theme\Trait\CommonModelMethodsTrait;
use Modules\Theme\Trait\CommonScopesTrait;
use Modules\Tutorial\Database\factories\TutorialFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Permission\Traits\HasRoles;

class Tutorial extends Model implements HasMedia
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

    protected static function newFactory(): TutorialFactory
    {
        return TutorialFactory::new();
    }

}
