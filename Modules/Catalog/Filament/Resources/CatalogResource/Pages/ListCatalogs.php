<?php

namespace Modules\Catalog\Filament\Resources\CatalogResource\Pages;

use Filament\Actions\CreateAction;
use Modules\Catalog\Filament\Resources\CatalogResource;
use Filament\Resources\Pages\ListRecords;

class ListCatalogs extends ListRecords
{
    protected static string $resource = CatalogResource::class;

    protected function getActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
