<?php

namespace Modules\Theme\Filament\Resources\OptionResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Theme\Filament\Resources\OptionResource;

class EditOption extends EditRecord
{
    protected static string $resource = OptionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
