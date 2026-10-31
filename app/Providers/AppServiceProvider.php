<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // <-- CRUCIAL: Añade esta línea de importación

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Forzar el protocolo HTTPS si estamos en el entorno de producción en Render
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}
