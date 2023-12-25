<?php

namespace Modules\Theme\Trait;


use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;
use Modules\Theme\Helpers\Helpers;
use Modules\Theme\Models\Category;
use Modules\User\Models\User;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Permission\Traits\HasRoles;


trait CommonModelMethodsTrait {

    use HasFactory ,SoftDeletes ,HasRoles ,InteractsWithMedia ,Searchable;

    protected function slug():Attribute
    {
        return Attribute::make(
            get: fn( $value ) =>  $value,
            set: fn( $value ) => Helpers::slugRectifier( $value )
        );
    }


    public function meta(): MorphMany
    {
        return $this->morphMany('Modules\Theme\Models\Meta','metaable');
    }


    public function category(): MorphToMany
    {
        return $this->morphToMany(Category::class ,'categorizable' );
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
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


    protected function getImagesAttribute(): array
    {
        $media = $this->getMedia('*')->first();
        if($media){
            return [
                'thumbnail' => $media->getUrl('thumbnail'),
                'cover'     => $media->getUrl('cover'),
                'single'    => $media->getUrl('single'),
            ];
        }
        return [];
    }

}
