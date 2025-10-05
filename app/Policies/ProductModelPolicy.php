<?php

namespace App\Policies;

use App\Models\ProductModel;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProductModelPolicy
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
    public function view(User $user, ProductModel $model): Response|bool
    {
        return AuthorizeCheck::isSuperAdmin($user)
                                    ? Response::allow()
                                    : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return AuthorizeCheck::isSuperAdmin($user)
                                    ? Response::allow()
                                    : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ProductModel $model): Response
    {
        return AuthorizeCheck::isSuperAdmin($user)
                                    ? Response::allow()
                                    : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ProductModel $model):Response
    {
        return AuthorizeCheck::isSuperAdmin($user)
                                    ? Response::allow()
                                    : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ProductModel $model): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ProductModel $model): bool
    {
        //
    }
}
