<?php

namespace Modules\Catalog\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Catalog\Database\factories\CatalogFactory;
use Modules\Theme\Trait\CommonModelMethodsTrait;
use Modules\Theme\Trait\CommonScopesTrait;

class Catalog extends Model
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

    protected static function newFactory(): CatalogFactory
    {
        return CatalogFactory::new();
    }

}
