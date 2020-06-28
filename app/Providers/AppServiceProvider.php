<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\RolModel;
use App\UserRolModel;
use App\RolSeccionModel;
use App\SeccionModel;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*esta parte impide hacer migraciones cuando recien se empieza - darle solución*/
        $users_rol = UserRolModel::all();
        $roles = RolModel::all();
        $rol_secciones = RolSeccionModel::all();
        $secciones = SeccionModel::all();

        View::share([
            'roles_provider' => $roles, 
            'users_rol_provider' => $users_rol, 
            'rol_secciones_provider' => $rol_secciones,
            'secciones_provider' => $secciones
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
