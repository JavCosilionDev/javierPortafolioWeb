<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

/**
 * SetLocale Middleware
 *
 * Middleware que aplica el idioma guardado en sesion
 * en cada solicitud HTTP. Se ejecuta antes de que
 * el controlador procese la solicitud.
 *
 * Para registrar este middleware, agregarlo en:
 * bootstrap/app.php (Laravel 11+) o app/Http/Kernel.php (Laravel 10)
 */
class SetLocale
{
    /**
     * Maneja la solicitud entrante.
     * Revisa si hay un idioma guardado en sesion y lo aplica.
     * Si no hay idioma en sesion, usa el idioma por defecto del sistema (espanol).
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        // Obtiene el locale de la sesion; por defecto usa 'es' (Espanol Mexico)
        $locale = session('locale', config('app.locale', 'es'));

        // Aplica el locale a la aplicacion Laravel
        App::setLocale($locale);

        return $next($request);
    }
}
