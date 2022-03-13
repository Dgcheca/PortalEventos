<?php

namespace App\Providers;
use App\Models\Torneo;
use App\Policies\TorneoPolicy;
use App\Models\Equipo;
use App\Policies\EquipoPolicy;
use App\Models\Juego;
use App\Policies\JuegoPolicy;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Torneo::class => TorneoPolicy::class,
        Equipo::class => EquipoPolicy::class,
        Juego::class => JuegoPolicy::class
        // 'App\Models\Torneo' => 'App\Policies\TorneoPolicy',
        // 'App\Models\Equipo' => 'App\Policies\EquipoPolicy',
        // 'App\Models\Juego' => 'App\Policies\JuegoPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
