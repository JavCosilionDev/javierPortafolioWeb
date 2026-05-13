<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

/**
 * PortfolioController
 *
 * Controlador principal del portafolio.
 * Maneja la logica para mostrar el portafolio, proyectos y datos del desarrollador.
 * Sigue el patron MVC con responsabilidades claramente separadas.
 */
class PortfolioController extends Controller
{
    /**
     * Muestra la pagina principal del portafolio.
     * Carga todos los datos necesarios: habilidades, proyectos, experiencia, etc.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Carga los proyectos desde la base de datos PostgreSQL
        $projects = Project::orderBy('order', 'asc')->get();

        // Datos del desarrollador estructurados para la vista
        $developerData = $this->getDeveloperData();

        return view('portfolio.index', compact('projects', 'developerData'));
    }

    /**
     * Retorna los proyectos en formato JSON para consumo por el frontend.
     * Endpoint de API interno usado por JavaScript.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProjects()
    {
        $projects = Project::orderBy('order', 'asc')->get();
        return response()->json($projects);
    }

    /**
     * Retorna la estructura de datos del desarrollador.
     * Centraliza toda la informacion del CV para facilitar el mantenimiento.
     *
     * @return array
     */
    private function getDeveloperData(): array
    {
        return [
            'name'          => 'Javier',
            'lastname'      => 'Cosilion',
            'title_es'      => 'Ingeniero en Software',
            'title_en'      => 'Software Engineer',
            'level'         => 'Mid-Level',
            'email'         => 'javiercosilion@gmail.com',
            'phone'         => '+52 (352) 125 4601',
            'cedula'        => '14529325',
            'location_es'   => 'México',
            'location_en'   => 'Mexico',
            'birthdate'     => '2000-08-26',
            'github'        => 'https://github.com/JavCosilionDev',
            'linkedin'      => 'https://www.linkedin.com/in/javdev/',
            'years_exp'     => 3,
        ];
    }
}
