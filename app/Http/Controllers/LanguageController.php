<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * LanguageController
 *
 * Controlador para el manejo del cambio de idioma.
 * Soporta Espanol Mexico (es) e Ingles EEUU (en).
 * El idioma seleccionado se almacena en sesion y en cookie
 * para persistir entre visitas.
 */
class LanguageController extends Controller
{
    /**
     * Idiomas soportados por la aplicacion.
     * Agregar nuevos idiomas aqui y en resources/lang/
     */
    private const SUPPORTED_LOCALES = ['es', 'en'];

    /**
     * Cambia el idioma de la aplicacion.
     * Valida que el locale solicitado sea uno de los soportados,
     * lo guarda en sesion y redirige de vuelta a la pagina anterior.
     *
     * @param  string  $locale  Codigo de idioma ('es' o 'en')
     * @return \Illuminate\Http\RedirectResponse
     */
    public function switch(string $locale)
    {
        // Validacion de seguridad: solo idiomas permitidos
        if (!in_array($locale, self::SUPPORTED_LOCALES)) {
            abort(400, 'Idioma no soportado / Unsupported language');
        }

        // Guarda el idioma en la sesion del usuario
        session(['locale' => $locale]);

        // Establece el locale de la aplicacion para la solicitud actual
        app()->setLocale($locale);

        // Redirige a la pagina anterior o a la pagina principal
        return redirect()->back()->withInput();
    }
}
