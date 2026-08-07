<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\INivelMembresiaRepository;
use App\Repositories\NivelMembresiaRepository;
use App\Interfaces\IUsuarioRepository;
use App\Repositories\UsuarioRepository;
use App\Interfaces\ICategoriaRepository;
use App\Repositories\CategoriaRepository;
use App\Interfaces\IEjercicioRepository;
use App\Repositories\EjercicioRepository;
use App\Interfaces\IPagoRepository;
use App\Repositories\PagoRepository;
use App\Interfaces\IPerfilEntrenadoraRepository;
use App\Repositories\PerfilEntrenadoraRepository;




class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(INivelMembresiaRepository::class, NivelMembresiaRepository::class);
        $this->app->bind(IUsuarioRepository::class, UsuarioRepository::class);
        $this->app->bind(ICategoriaRepository::class, CategoriaRepository::class);
        $this->app->bind(IEjercicioRepository::class, EjercicioRepository::class);
        $this->app->bind(IPagoRepository::class, PagoRepository::class);
        $this->app->bind(IPerfilEntrenadoraRepository::class, PerfilEntrenadoraRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}