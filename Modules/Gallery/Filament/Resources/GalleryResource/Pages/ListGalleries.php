<?php

namespace Modules\Gallery\Filament\Resources\GalleryResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;
use Illuminate\Database\Eloquent\Builder;
use Modules\Gallery\Filament\Resources\GalleryResource;

class ListGalleries extends ListRecords
{
    protected static string $resource = GalleryResource::class;

    protected function getActions(): array
    {
        return [
           CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('همه')
                ->badge(static::getModel()::count()),

            'active' => Tab::make('منتشر شده')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status' , 'publish'))
                ->badge(static::getModel()::query()->where('status' ,'publish')->count()),

            'inactive' => Tab::make('غیر فعال')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status' ,'<>' ,'publish' ))
                ->badge(static::getModel()::query()->where('status' ,'<>' ,'publish')->count()),
        ];
    }
}
