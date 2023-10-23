<?php

namespace Modules\Standard\Filament\Resources\StandardResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Modules\Standard\Filament\Resources\StandardResource;

class ListStandard extends ListRecords
{
    protected static string $resource = StandardResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
