<?php

namespace Modules\Blog\Filament;


use Althinect\FilamentSpatieRolesPermissions\Resources\PermissionResource;
use Althinect\FilamentSpatieRolesPermissions\Resources\RoleResource;
use Filament\Contracts\Plugin;
use Filament\Panel;
use Modules\Blog\Filament\Resources\BlogResource;


class BlogPlugin implements Plugin
{
    public function getId(): string
    {
        return 'blog';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->resources([
                BlogResource::class,
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
