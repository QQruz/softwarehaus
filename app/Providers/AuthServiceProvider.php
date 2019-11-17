<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // users that are waiting for moderation (approved === 0 (false))
        // cant post new jobs
        Gate::define('post-jobs', function($user) {
            return $user->approved !== 0;
        });

        Gate::define('edit-users', function($user) {
            return $user->hasRole('admin');
        });
    }
}
