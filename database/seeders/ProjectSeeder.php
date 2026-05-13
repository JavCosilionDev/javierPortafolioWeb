<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

/**
 * ProjectSeeder
 *
 * Siembra la base de datos con los proyectos del portafolio.
 * Cada proyecto tiene datos en espanol e ingles.
 * Los tipos de plantilla son: 'featured', 'card', 'timeline'.
 *
 * Para ejecutar: php artisan db:seed --class=ProjectSeeder
 */
class ProjectSeeder extends Seeder
{
    /**
     * Inserta los proyectos del portafolio en la base de datos.
     * Se usan tres tipos de plantilla distintas segun el tipo de proyecto.
     */
    public function run(): void
    {
        // Limpia proyectos existentes antes de sembrar
        Project::truncate();

        $projects = [
            // -------------------------------------------------------
            // PROYECTOS DESTACADOS (tipo: featured) - Plantilla grande
            // -------------------------------------------------------
            [
                'title_es'      => 'El Tiliche Rewards - App Movil',
                'title_en'      => 'El Tiliche Rewards - Mobile App',
                'description_es'=> 'Aplicacion movil para clientes que permite registrar compras, acumular puntos, canjear recompensas y consultar productos y promociones. Desarrollada con Flutter y Dart, integrada con APIs REST. Publicada en App Store y Google Play.',
                'description_en'=> 'Customer mobile application that allows registering purchases, accumulating points, redeeming rewards, and browsing products and promotions. Built with Flutter and Dart, integrated with REST APIs. Published on App Store and Google Play.',
                'type'          => 'featured',
                'category'      => 'mobile',
                'technologies'  => ['Flutter', 'Dart', 'REST API', 'JWT', 'App Store', 'Google Play'],
                'url'           => null,
                'github_url'    => null,
                'image'         => null,
                'status_es'     => 'Produccion',
                'status_en'     => 'Production',
                'order'         => 1,
                'period'        => 'Feb 2025 - Presente',
                'company'       => 'Orbal Technologies',
            ],
            [
                'title_es'      => 'SAP-UPPE - Plataforma Institucional',
                'title_en'      => 'SAP-UPPE - Institutional Platform',
                'description_es'=> 'Expansion y mejora de la plataforma SAP institucional de la Universidad. Se disenaron e implementaron nuevos modulos para integrar el proceso ensenanza-aprendizaje usando metodologia Scrum y arquitectura MVC en Laravel y PHP.',
                'description_en'=> 'Expansion and improvement of the university SAP institutional platform. New modules were designed and implemented to integrate the teaching-learning process using Scrum methodology and MVC architecture in Laravel and PHP.',
                'type'          => 'featured',
                'category'      => 'web',
                'technologies'  => ['PHP', 'Laravel', 'MySQL', 'JavaScript', 'jQuery', 'Bootstrap', 'Blade'],
                'url'           => null,
                'github_url'    => null,
                'image'         => null,
                'status_es'     => 'Produccion',
                'status_en'     => 'Production',
                'order'         => 2,
                'period'        => 'Jun 2023 - Feb 2025',
                'company'       => 'UPPE',
            ],

            // -------------------------------------------------------
            // PROYECTOS EN TARJETA (tipo: card) - Plantilla grid
            // -------------------------------------------------------
            [
                'title_es'      => 'E-Commerce ASP.NET Core',
                'title_en'      => 'E-Commerce ASP.NET Core',
                'description_es'=> 'Backend completo con ASP.NET Core incluyendo autenticacion JWT, CRUD de productos, carrito, ordenes, usuarios, manejo de estados, concurrencia de stock, webhooks simulados de pago y microservicios. Frontend en Angular.',
                'description_en'=> 'Full backend with ASP.NET Core including JWT auth, CRUD for products, cart, orders, users, order state management, stock concurrency, simulated payment webhooks, and microservices. Frontend built in Angular.',
                'type'          => 'card',
                'category'      => 'backend',
                'technologies'  => ['.NET', 'C#', 'Angular', 'TypeScript', 'PostgreSQL', 'JWT', 'Docker'],
                'url'           => null,
                'github_url'    => null,
                'image'         => null,
                'status_es'     => 'Proyecto Personal',
                'status_en'     => 'Personal Project',
                'order'         => 3,
                'period'        => '2024',
                'company'       => 'Proyecto Personal',
            ],
            [
                'title_es'      => 'App Movil Full Stack (Flutter + NestJS)',
                'title_en'      => 'Full Stack Mobile App (Flutter + NestJS)',
                'description_es'=> 'Aplicacion movil creada desde cero con Flutter para el frontend y NestJS con TypeScript para el backend. Incluye autenticacion JWT, gestion de datos, clientes y panel de control con graficas dinamicas.',
                'description_en'=> 'Mobile app built from scratch with Flutter for the frontend and NestJS with TypeScript for the backend. Includes JWT authentication, data management, clients, and control panel with dynamic charts.',
                'type'          => 'card',
                'category'      => 'mobile',
                'technologies'  => ['Flutter', 'Dart', 'NestJS', 'Node.js', 'TypeScript', 'PostgreSQL', 'JWT'],
                'url'           => null,
                'github_url'    => null,
                'image'         => null,
                'status_es'     => 'Proyecto Personal',
                'status_en'     => 'Personal Project',
                'order'         => 4,
                'period'        => '2024',
                'company'       => 'Proyecto Personal',
            ],
            [
                'title_es'      => 'Auto Partes El Tiliche - ERP Web',
                'title_en'      => 'Auto Partes El Tiliche - Web ERP',
                'description_es'=> 'Sistema ERP enfocado en ventas, inventario y operaciones internas. Responsable del mantenimiento, mejoras y soporte operativo. Incluye reportes personalizados y optimizacion de queries SQL.',
                'description_en'=> 'ERP system focused on sales, inventory, and internal operations. Responsible for maintenance, improvements, and operational support. Includes custom reports and SQL query optimization.',
                'type'          => 'card',
                'category'      => 'erp',
                'technologies'  => ['PHP', 'Laravel', 'MySQL', 'JavaScript', 'jQuery', 'Bootstrap'],
                'url'           => 'https://refaeltiliche.com',
                'github_url'    => null,
                'image'         => null,
                'status_es'     => 'Produccion',
                'status_en'     => 'Production',
                'order'         => 5,
                'period'        => 'Jun 2022 - Presente',
                'company'       => 'Orbal Technologies',
            ],
            [
                'title_es'      => 'MIRA Business Suite - ERP',
                'title_en'      => 'MIRA Business Suite - ERP',
                'description_es'=> 'Mantenimiento, optimizacion y desarrollo de nuevos modulos en ERP de ventas, facturacion e inventario. Integracion con API de facturacion electronica Facturama. Arquitectura OOP y MVC en PHP core.',
                'description_en'=> 'Maintenance, optimization, and development of new modules in a sales, invoicing, and inventory ERP. Integration with Facturama electronic invoicing API. OOP and MVC architecture in core PHP.',
                'type'          => 'card',
                'category'      => 'erp',
                'technologies'  => ['PHP', 'MySQL', 'JavaScript', 'jQuery', 'Bootstrap', 'Facturama API'],
                'url'           => 'https://miranegocios.com',
                'github_url'    => null,
                'image'         => null,
                'status_es'     => 'Produccion',
                'status_en'     => 'Production',
                'order'         => 6,
                'period'        => 'Jun 2022 - Presente',
                'company'       => 'Orbal Technologies',
            ],

            // -------------------------------------------------------
            // PROYECTOS TIMELINE - Linea de tiempo de contribuciones
            // -------------------------------------------------------
            [
                'title_es'      => 'Rediseno Sitio Web UPPE',
                'title_en'      => 'UPPE Website Redesign',
                'description_es'=> 'Rediseno completo del sitio web institucional de la universidad. Se actualizaron contenidos y se agregaron secciones de Tour Virtual, Eventos, Promociones y Accesibilidad Web para mejorar la usabilidad.',
                'description_en'=> 'Complete redesign of the university institutional website. Content was updated and new sections were added: Virtual Tour, Events, Promotions, and Web Accessibility to improve usability.',
                'type'          => 'timeline',
                'category'      => 'web',
                'technologies'  => ['HTML5', 'CSS3', 'JavaScript', 'Bootstrap', 'PHP'],
                'url'           => null,
                'github_url'    => null,
                'image'         => null,
                'status_es'     => 'Completado',
                'status_en'     => 'Completed',
                'order'         => 7,
                'period'        => 'Jun 2023 - Ago 2023',
                'company'       => 'UPPE',
            ],
            [
                'title_es'      => 'Sistema de Asistencia con Biometrico',
                'title_en'      => 'Biometric Attendance System',
                'description_es'=> 'Sistema de control de asistencia de empleados con entradas, salidas, retardos, ausencias e incidencias, integrando datos biometricos desde servidor BioTime.',
                'description_en'=> 'Employee attendance control system with entries, exits, delays, absences, and incidents, integrating biometric data from a BioTime server.',
                'type'          => 'timeline',
                'category'      => 'web',
                'technologies'  => ['PHP', 'Laravel', 'MySQL', 'BioTime API', 'JavaScript'],
                'url'           => null,
                'github_url'    => null,
                'image'         => null,
                'status_es'     => 'Produccion',
                'status_en'     => 'Production',
                'order'         => 8,
                'period'        => '2023 - 2024',
                'company'       => 'UPPE',
            ],
            [
                'title_es'      => 'Nu3 GrandPET - Sitio Web',
                'title_en'      => 'Nu3 GrandPET - Website',
                'description_es'=> 'Diseno e implementacion del frontend de sitio web para empresa de productos para mascotas. Algunas paginas aun reflejan el diseno original del trabajo realizado.',
                'description_en'=> 'Frontend design and implementation of a website for a pet products company. Some pages still reflect the original design work.',
                'type'          => 'timeline',
                'category'      => 'web',
                'technologies'  => ['HTML', 'CSS', 'JavaScript'],
                'url'           => 'https://grandpet.com',
                'github_url'    => null,
                'image'         => null,
                'status_es'     => 'Produccion',
                'status_en'     => 'Production',
                'order'         => 9,
                'period'        => '2022',
                'company'       => 'Orbal Technologies',
            ],
        ];

        // Inserta todos los proyectos en la base de datos
        foreach ($projects as $project) {
            Project::create($project);
        }

        $this->command->info('Proyectos sembrados correctamente: ' . count($projects) . ' proyectos insertados.');
    }
}
