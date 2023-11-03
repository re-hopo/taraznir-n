<?php

namespace Modules\Theme\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Modules\Project\Models\Project;
use Modules\Standard\Models\Standard;
use Modules\Theme\Helpers\ThemeHelpers;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'cover',
        'model',
    ];

    protected function slug():Attribute
    {
        return Attribute::make(
            get: fn( $value ) =>  $value ,
            set: fn( $value ) =>  ThemeHelpers::slugRectifier( $value )
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
}
