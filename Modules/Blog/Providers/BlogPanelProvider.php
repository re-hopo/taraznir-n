<?php

namespace Modules\Blog\Providers;



use Filament\Panel;
use Filament\PanelProvider;
use Modules\Blog\Filament\Resources\BlogResource;

class BlogPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {

        return $panel
            ->id('blog')
            ->path('blog')
            ->resources([
                BlogResource::class
            ])
            ->pages([
                // ...
            ])
            ->widgets([
                // ...
            ])
            ->middleware([
                // ...
            ])
            ->authMiddleware([
                // ...
            ]);
    }
}
