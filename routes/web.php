<?php

/*
|--------------------------------------------------------------------------
| Web Routes - Portfolio
|--------------------------------------------------------------------------
|
| Aqui se registran todas las rutas web del portafolio.
| Incluye rutas para el portafolio principal, proyectos, contacto
| y el selector de idioma.
|
*/

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\LanguageController;

/**
 * Ruta principal del portafolio.
 * Renderiza la vista principal con toda la informacion del desarrollador.
 */
Route::get('/', [PortfolioController::class, 'index'])->name('home');

/**
 * Ruta para cambiar el idioma de la aplicacion.
 * Acepta 'es' (Espanol Mexico) o 'en' (Ingles EEUU).
 */
Route::get('/language/{locale}', [LanguageController::class, 'switch'])
    ->where('locale', 'es|en')
    ->name('language.switch');

/**
 * Ruta para obtener los datos de proyectos en formato JSON.
 * Usada por el frontend para cargar los proyectos dinamicamente.
 */
Route::get('/api/projects', [PortfolioController::class, 'getProjects'])->name('api.projects');
