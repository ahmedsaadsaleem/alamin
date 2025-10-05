<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Customer;
use App\Models\User;
use App\Policies\AuthorizeCheck;
use App\Policies\CustomerPolicy;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Customer::class => CustomerPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Gate::guessPolicyNamesUsing(function (string $modelClass) {
        //     return $this->policies[$modelClass]; 
        // });

        Gate::before(function (User $user, string $ability) {
            if (AuthorizeCheck::isSuperAdmin($user)) {
                return true;
            }
        });
    }
}
