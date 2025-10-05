<?php

namespace App\Policies;

use App\Models\CustomerProduct;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CustomerProductPolicy
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
        return AuthorizeCheck::userCan($user, 'viewAny', 'customers_products') ? Response::allow()
                                                : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, CustomerProduct $branch): Response|bool
    {
        return AuthorizeCheck::userCan($user, 'view', 'customers_products')
                                        ? Response::allow()
                                        : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return AuthorizeCheck::userCan($user, 'create', 'customers_products')
                                    ? Response::allow()
                                    : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, CustomerProduct $branch): Response
    {
        return AuthorizeCheck::userCan($user, 'update', 'customers_products')
                                        ? Response::allow()
                                        : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CustomerProduct $branch):Response
    {
        return AuthorizeCheck::userCan($user, 'delete', 'customers_products')
                                        ? Response::allow()
                                        : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can restore the model.
     */
    // public function restore(User $user, CustomerProduct $branch): bool
    // {
    //     //
    // }

    /**
     * Determine whether the user can permanently delete the model.
     */
    // public function forceDelete(User $user, CustomerProduct $branch): bool
    // {
    //     //
    // }
}
