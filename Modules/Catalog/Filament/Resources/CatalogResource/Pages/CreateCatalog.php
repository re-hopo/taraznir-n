<?php

namespace Modules\Catalog\Filament\Resources\CatalogResource\Pages;

use Modules\Catalog\Filament\Resources\CatalogResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCatalog extends CreateRecord
{
    protected static string $resource = CatalogResource::class;
}
