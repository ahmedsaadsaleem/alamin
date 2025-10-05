<?php

namespace App\Policies;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CustomerPolicy
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
        return AuthorizeCheck::userCan($user, 'viewAny', 'customers') ? Response::allow()
                                                : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Customer $customer): Response|bool
    {
        return AuthorizeCheck::userCan($user, 'view', 'customers')
                                        ? Response::allow()
                                        : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return AuthorizeCheck::userCan($user, 'create', 'customers')
                                    ? Response::allow()
                                    : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Customer $customer): Response
    {
        return AuthorizeCheck::userCan($user, 'update', 'customers')
                                        ? Response::allow()
                                        : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Customer $customer):Response
    {
        return AuthorizeCheck::userCan($user, 'delete', 'customers')
                                        ? Response::allow()
                                        : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can restore the model.
     */
    // public function restore(User $user, Customer $customer): bool
    // {
    //     //
    // }

    /**
     * Determine whether the user can permanently delete the model.
     */
    // public function forceDelete(User $user, Customer $customer): bool
    // {
    //     //
    // }
}
