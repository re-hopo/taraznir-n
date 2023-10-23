<?php

namespace Modules\Misc\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\User\Models\User;
use Spatie\Permission\Models\Role as Roles;

class RulePolicy
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
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Roles $role
     * @return bool
     */
    public function view(User $user, Roles $role): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Roles $role
     * @return bool
     */
    public function update(User $user, Roles $role): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Roles $role
     * @return bool
     */
    public function delete(User $user, Roles $role): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Roles $role
     * @return bool
     */
    public function restore(User $user, Roles $role): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Roles $role
     * @return bool
     */
    public function forceDelete(User $user, Roles $role): bool
    {
        return $user->isAdmin();
    }
}
