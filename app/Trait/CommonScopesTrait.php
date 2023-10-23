<?php

namespace App\Trait;


use Illuminate\Database\Eloquent\Builder;

trait CommonScopesTrait{



    public static function scopeOrderByScope( Builder $query ,string|null $orderBy ,string|null $direction ): Builder
    {
        $orderBy   = $orderBy   ?: 'id';
        $direction = $direction ?: 'asc';
        return $query->orderBy( $orderBy ,$direction);
    }


    public function scopeActiveScope($query)
    {
        $query->where('status' ,'publish');
    }


    public function scopeSort( $query )
    {
        return $query->orderBy('chosen' ,'desc');
    }

}
