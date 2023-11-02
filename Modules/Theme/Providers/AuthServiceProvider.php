<?php

namespace Modules\Theme\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Modules\Theme\Policies\NavigationPolicy;
use Modules\Theme\Policies\PermissionPolicy;
use Modules\Theme\Policies\RulePolicy;
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
