<?php

namespace Modules\Theme\Models;


use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Modules\Theme\Trait\CommonModelMethodsTrait;
use Modules\Theme\Trait\CommonScopesTrait;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Permission\Traits\HasRoles;

class Option extends Model implements HasMedia
{
    use CommonScopesTrait ,CommonModelMethodsTrait ,HasRoles;

    protected $appends = ['jalali_created_at' ,'images'];

    protected $fillable = [
        'title',
        'key',
        'value',
        'type'
    ];

    protected function value():Attribute
    {
        return Attribute::make(
            get: fn( $value ) =>  $value,
            set: fn( $value ) => !$this->type ? strip_tags( $value ) : $value
        );
    }


    public function toSearchableArray(): array
    {
        return [
            'title' => strip_tags( $this->value ),
        ];
    }



}
