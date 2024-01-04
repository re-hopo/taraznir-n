<?php

namespace Modules\Gallery\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Gallery\Database\factories\GalleryFactory;

class Gallery extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    
    protected static function newFactory(): GalleryFactory
    {
        //return GalleryFactory::new();
    }
}
