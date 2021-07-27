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

        Gate::define('isAdmin', function ($user) {
            return $user->grupos->first()->nombre == 'Administrador';
        });

        Gate::define('isEmpresa', function ($user) {
            return $user->grupos->first()->nombre == 'Empresa';
        });

        Gate::define('isAgente', function ($user) {
            return $user->grupos->first()->nombre == 'Agente';
        });
        Gate::define('isParticular', function ($user) {
            return $user->grupos->first()->nombre == 'Particular';
        });
    }
}
