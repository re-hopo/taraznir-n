<?php

namespace Modules\Catalog\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Catalog\Database\factories\CatalogFactory;
use Modules\Theme\Trait\CommonModelMethodsTrait;
use Modules\Theme\Trait\CommonScopesTrait;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Permission\Traits\HasRoles;

class Catalog extends Model implements HasMedia
{
    use CommonScopesTrait ,CommonModelMethodsTrait ,HasRoles;

    protected $appends = ['images'];

    protected $fillable = [
        'title',
        'slug',
        'summary',
        'status',
        'chosen',
    ];

    protected static function newFactory(): CatalogFactory
    {
        return CatalogFactory::new();
    }

}
