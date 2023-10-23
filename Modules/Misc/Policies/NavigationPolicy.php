<?php

namespace Modules\Misc\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\User\Models\User;
use RyanChandler\FilamentNavigation\Models\Navigation;

class NavigationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->isAdmin() || $user->getAllPermissions()->where('name' ,'Navigation')->count();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Navigation $navigation
     * @return bool
     */
    public function view(User $user, Navigation $navigation): bool
    {
        return $user->isAdmin() || $user->getAllPermissions()->where('name' ,'Navigation')->count();
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->isAdmin() || $user->getAllPermissions()->where('name' ,'Navigation')->count();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Navigation $navigation
     * @return bool
     */
    public function update(User $user, Navigation $navigation): bool
    {
        return $user->isAdmin() || $user->getAllPermissions()->where('name' ,'Navigation')->count();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Navigation $navigation
     * @return bool
     */
    public function delete(User $user, Navigation $navigation): bool
    {
        return $user->isAdmin() || $user->getAllPermissions()->where('name' ,'Navigation')->count();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Navigation $navigation
     * @return bool
     */
    public function restore(User $user, Navigation $navigation): bool
    {
        return $user->isAdmin() || $user->getAllPermissions()->where('name' ,'Navigation')->count();
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Navigation $navigation
     * @return bool
     */
    public function forceDelete(User $user, Navigation $navigation): bool
    {
        return $user->isAdmin() || $user->getAllPermissions()->where('name' ,'Navigation')->count();
    }
}
