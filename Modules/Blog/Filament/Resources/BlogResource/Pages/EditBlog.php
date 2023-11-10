<?php

namespace Modules\Blog\Filament\Resources\BlogResource\Pages;

use Filament\Actions\DeleteAction;
use Modules\Blog\Filament\Resources\BlogResource;
use Filament\Resources\Pages\EditRecord;

class EditBlog extends EditRecord
{
    protected static string $resource = BlogResource::class;

    protected function getActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
