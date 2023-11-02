<?php

namespace App\Trait;


use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Theme\Helpers\MiscHelper;
use Modules\Theme\Models\Category;


trait CommonModelMethodsTrait{

    use HasFactory ,SoftDeletes;

    protected function slug():Attribute
    {
        return Attribute::make(
            get: fn( $value ) =>  $value,
            set: fn( $value ) => MiscHelper::slugRectifier( $value )
        );
    }

    protected function getJalaliCreatedAtAttribute(): int|string
    {
        return MiscHelper::numberConverter(
            MiscHelper::jalaliToGregorianAndConversely( $this->created_at ,format:'Y-m-d H:i')
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
}
