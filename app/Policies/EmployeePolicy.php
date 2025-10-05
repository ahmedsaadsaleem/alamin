<?php

namespace App\Policies;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EmployeePolicy
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
        return AuthorizeCheck::userCan($user, 'viewAny', 'employees') ? Response::allow()
                                                : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Employee $employee): Response|bool
    {
        return AuthorizeCheck::userCan($user, 'view', 'employees')
                                        ? Response::allow()
                                        : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return AuthorizeCheck::userCan($user, 'create', 'employees')
                                    ? Response::allow()
                                    : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Employee $employee): Response
    {
        return AuthorizeCheck::userCan($user, 'update', 'employees')
                                        ? Response::allow()
                                        : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Employee $employee):Response
    {
        return AuthorizeCheck::userCan($user, 'delete', 'employees')
                                        ? Response::allow()
                                        : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can restore the model.
     */
    // public function restore(User $user, Employee $employee): bool
    // {
    //     //
    // }

    /**
     * Determine whether the user can permanently delete the model.
     */
    // public function forceDelete(User $user, Employee $employee): bool
    // {
    //     //
    // }
}
