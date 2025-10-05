<?php

namespace App\Policies;

use App\Models\CustomerBranch;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CustomerBranchPolicy
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
        return AuthorizeCheck::userCan($user, 'viewAny', 'customers_branches') ? Response::allow()
                                                : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, CustomerBranch $branch): Response|bool
    {
        return AuthorizeCheck::userCan($user, 'view', 'customers_branches')
                                        ? Response::allow()
                                        : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return AuthorizeCheck::userCan($user, 'create', 'customers_branches')
                                    ? Response::allow()
                                    : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, CustomerBranch $branch): Response
    {
        return AuthorizeCheck::userCan($user, 'update', 'customers_branches')
                                        ? Response::allow()
                                        : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CustomerBranch $branch):Response
    {
        return AuthorizeCheck::userCan($user, 'delete', 'customers_branches')
                                        ? Response::allow()
                                        : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can restore the model.
     */
    // public function restore(User $user, CustomerBranch $branch): bool
    // {
    //     //
    // }

    /**
     * Determine whether the user can permanently delete the model.
     */
    // public function forceDelete(User $user, CustomerBranch $branch): bool
    // {
    //     //
    // }
}
