<?php

namespace App\Policies;

use App\Models\Department;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DepartmentPolicy
{
    public function before(User $user, string $ability): bool|null
    {
        if (AuthorizeCheck::isAdminstrator($user)) {
            return true;
        }
        
        return null;
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response|bool
    {
        return AuthorizeCheck::userCan($user, 'viewAny', 'departments') ? Response::allow()
                                                : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Department $department): Response|bool
    {
        return AuthorizeCheck::userCan($user, 'view', 'departments')
                                        ? Response::allow()
                                        : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return AuthorizeCheck::userCan($user, 'create', 'departments')
                                    ? Response::allow()
                                    : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Department $department): Response
    {
        return AuthorizeCheck::userCan($user, 'update', 'departments')
                                        ? Response::allow()
                                        : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Department $department):Response
    {
        return AuthorizeCheck::userCan($user, 'delete', 'departments')
                                        ? Response::allow()
                                        : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can restore the model.
     */
    // public function restore(User $user, Department $department): bool
    // {
    //     //
    // }

    /**
     * Determine whether the user can permanently delete the model.
     */
    // public function forceDelete(User $user, Department $department): bool
    // {
    //     //
    // }
}
