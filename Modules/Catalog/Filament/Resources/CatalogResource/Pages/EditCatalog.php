<?php

namespace Modules\Catalog\Filament\Resources\CatalogResource\Pages;

use Filament\Actions\DeleteAction;
use Modules\Catalog\Filament\Resources\CatalogResource;
use Filament\Resources\Pages\EditRecord;

class EditCatalog extends EditRecord
{
    protected static string $resource = CatalogResource::class;

    protected function getActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
