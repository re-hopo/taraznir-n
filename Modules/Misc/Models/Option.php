<?php

namespace Modules\Misc\Models;


use App\Trait\CommonModelMethodsTrait;
use App\Trait\CommonScopesTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;

class Option extends Model  implements HasMedia
{
    use CommonScopesTrait ,CommonModelMethodsTrait;

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
