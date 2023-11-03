<?php

namespace App\Trait;


use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Theme\Helpers\ThemeHelpers;
use Modules\Theme\Models\Category;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Permission\Traits\HasRoles;


trait CommonModelMethodsTrait {

    use HasFactory ,SoftDeletes ,HasRoles ,InteractsWithMedia;

    protected function slug():Attribute
    {
        return Attribute::make(
            get: fn( $value ) =>  $value,
            set: fn( $value ) => ThemeHelpers::slugRectifier( $value )
        );
    }

    protected function getJalaliCreatedAtAttribute(): int|string
    {
        return ThemeHelpers::numberConverter(
            ThemeHelpers::jalaliToGregorianAndConversely( $this->created_at ,format:'Y-m-d H:i')
        ,true );
    }


    public function featuredImage(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'featured_image_id', 'id');
    }

    public function meta(): MorphMany
    {
        return $this->morphMany('Modules\Theme\Models\Meta','metaable');
    }


    public function category(): MorphToMany
    {
        return $this->morphToMany(Category::class ,'categorizable' );
    }



    public function toSearchableArray(): array
    {
        return [
            'title'      => $this->title,
            'summary'    => $this->summary,
            'content'    => strip_tags( $this->content ),
        ];
    }


    /**
     * @throws InvalidManipulation
     */
    public function registerMediaConversions( Media $media = null): void
    {
        $this
            ->addMediaConversion('thumbnail')
            ->fit(Manipulations::FIT_CROP, 140, 105);

        $this
            ->addMediaConversion('cover')
            ->fit(Manipulations::FIT_CROP, 420, 315);

        $this
            ->addMediaConversion('single')
            ->fit(Manipulations::FIT_CROP, 1260, 945);
    }
}
