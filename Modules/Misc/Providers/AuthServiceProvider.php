<?php

namespace Modules\Misc\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


use Modules\Misc\Policies\NavigationPolicy;
use Modules\Misc\Policies\PermissionPolicy;
use Modules\Misc\Policies\RulePolicy;
use RyanChandler\FilamentNavigation\Models\Navigation;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AuthServiceProvider  extends ServiceProvider
{

    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Permission::class => PermissionPolicy::class,
        Role::class       => RulePolicy::class,
        Navigation::class => NavigationPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
