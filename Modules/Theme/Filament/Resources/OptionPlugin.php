<?php

namespace Modules\Theme\Filament\Resources;


use Filament\Contracts\Plugin;
use Filament\Panel;


class OptionPlugin implements Plugin
{
    public function getId(): string
    {
        return 'option';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->resources([
                OptionResource::class,
            ])
            ->pages([
//                Settings::class,
            ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
