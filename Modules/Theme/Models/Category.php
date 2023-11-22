<?php

namespace Modules\Theme\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Modules\Blog\Models\Blog;
use Modules\Project\Models\Project;
use Modules\Standard\Models\Standard;
use Modules\Theme\Helpers\Helpers;
use Modules\Theme\Trait\CommonModelMethodsTrait;
use Modules\Theme\Trait\CommonScopesTrait;
use Spatie\MediaLibrary\HasMedia;

class Category extends Model implements HasMedia
{
    use CommonScopesTrait ,CommonModelMethodsTrait;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'icon',
        'model',
    ];

    protected function slug():Attribute
    {
        return Attribute::make(
            get: fn( $value ) =>  $value ,
            set: fn( $value ) =>  Helpers::slugRectifier( $value )
        );
    }

    public function standard(): MorphToMany
    {
        return $this->morphedByMany(Standard::class ,'categorizable');
    }

    public function project(): MorphToMany
    {
        return $this->morphedByMany(Project::class ,'categorizable');
    }

    public function blog(): MorphToMany
    {
        return $this->morphedByMany(Blog::class ,'categorizable');
    }
}
