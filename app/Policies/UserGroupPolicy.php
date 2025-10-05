<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Auth\Access\Response;

class UserGroupPolicy
{
    public function before(User $user, string $ability): bool|null
    {
        if (AuthorizeCheck::isSuperAdmin($user)) {
            return true;
        }
    
        return null;
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response|bool
    {
        return AuthorizeCheck::isSuperAdmin($user)
                                    ? Response::allow()
                                    : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, UserGroup $group): Response|bool
    {
        return AuthorizeCheck::isSuperAdmin($user)
                                    ? Response::allow()
                                    : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, UserGroup $group): Response
    {
        return AuthorizeCheck::isSuperAdmin($user)
                                    ? Response::allow()
                                    : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, UserGroup $group): Response
    {
        return AuthorizeCheck::isSuperAdmin($user)
                                    ? Response::allow()
                                    : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, UserGroup $group):Response
    {
        return AuthorizeCheck::isSuperAdmin($user)
                                    ? Response::allow()
                                    : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, UserGroup $group): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, UserGroup $group): bool
    {
        //
    }
}
