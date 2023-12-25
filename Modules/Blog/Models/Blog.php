<?php

namespace Modules\Blog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Laravel\Scout\Searchable;
use Modules\Blog\Database\factories\BlogFactory;
use Modules\Theme\Models\Comment;
use Modules\Theme\Trait\CommonModelMethodsTrait;
use Modules\Theme\Trait\CommonScopesTrait;
use Modules\User\Models\User;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Permission\Traits\HasRoles;

class Blog extends Model implements HasMedia
{

    use CommonScopesTrait ,CommonModelMethodsTrait ,HasRoles ,Searchable;

    protected $appends = ['images'];

    protected $fillable = [
        'title',
        'slug',
        'summary',
        'content',
        'status',
        'chosen',
        'author_id',
    ];

    public function comment(): MorphMany
    {
        return $this->morphMany(Comment::class ,'commentable')
            ->whereRaw('parent_id = 0 OR parent_id IS NULL');
    }

    protected static function newFactory(): BlogFactory
    {
        return BlogFactory::new();
    }

    /**
     * Get the name of the index associated with the model.
     */
    public function searchableAs(): string
    {
        return 'first';
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
