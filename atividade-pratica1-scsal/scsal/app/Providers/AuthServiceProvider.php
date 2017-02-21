<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Proteção para edição e exclusao de exames apenas pelo paciente dono do exame
        Gate::define('manipular-exame', function ($user, $exame) {
            return $user->id == $exame->paciente_id;
        });

        // Proteção para ações de administrador
        Gate::define('administrar', function () {
            return Auth::user()->administrador();
        });

        // Proteção para açõoes de operador
        Gate::define('operar', function () {
            return Auth::user()->operador();
        });
    }
}
