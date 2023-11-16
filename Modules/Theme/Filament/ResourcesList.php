<?php

namespace Modules\Theme\Filament;


use Filament\Contracts\Plugin;
use Filament\Panel;
use Modules\Blog\Filament\Resources\BlogResource;
use Modules\News\Filament\Resources\NewsResource;
use Modules\Project\Filament\Resources\ProjectResource;
use Modules\Service\Filament\Resources\ServiceResource;
use Modules\Standard\Filament\Resources\StandardResource;
use Modules\Theme\Filament\Resources\CategoryResource;
use Modules\Theme\Filament\Resources\OptionResource;
use Modules\Tutorial\Filament\Resources\TutorialResource;


class ResourcesList implements Plugin
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
                CategoryResource::class,
                BlogResource::class,
                StandardResource::class,
                ProjectResource::class,
                NewsResource::class,
                TutorialResource::class,
                ServiceResource::class
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
