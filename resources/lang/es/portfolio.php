<?php

/*
|--------------------------------------------------------------------------
| Archivo de traducciones - Español (México)
|--------------------------------------------------------------------------
|
| Este archivo contiene todas las cadenas de texto del portafolio
| en Español (México). Para agregar una nueva clave, agregarla aquí
| y en resources/lang/en/portfolio.php con su equivalente en inglés.
|
*/

return [

    // -------------------------------------------------------------------
    // Navegación y UI general
    // -------------------------------------------------------------------
    'nav' => [
        'home'     => 'Inicio',
        'projects' => 'Proyectos',
        'contact'  => 'Contacto',
    ],

    'language' => [
        'current'  => 'ES',
        'switch'   => 'EN',
        'label_es' => 'Español (México)',
        'label_en' => 'English (US)',
    ],

    // -------------------------------------------------------------------
    // Preloader
    // -------------------------------------------------------------------
    'preloader' => [
        'loading' => 'Cargando...',
    ],

    // -------------------------------------------------------------------
    // Página de bienvenida - Sección hero
    // -------------------------------------------------------------------
    'hero' => [
        'greeting'      => 'Hola, soy',
        'role'          => 'Ingeniero en Software',
        'level'         => 'Mid-Level Developer',
        'experience'    => 'más de 3 años de experiencia',
        'scroll_hint'   => 'Desliza para explorar',
        'cta_projects'  => 'Ver Proyectos',
        'cta_contact'   => 'Contacto',
        'summary'       => 'Ingeniero de Software con experiencia sólida en el diseño, desarrollo e implementación de aplicaciones web y móviles escalables,
        trabajando tanto en el sector público como en el privado. A lo largo de mi carrera, he participado en todas las fases del ciclo de vida del desarrollo:
        levantamiento de requerimientos, diseño de interfaces y experiencia de usuario, modelado y optimización de bases de datos, creación de consultas SQL
        avanzadas, desarrollo e integración de APIs, y generación de reportes automatizados. Trabajo principalmente con PHP (Laravel), Python (Django),
        JavaScript, Dart (Flutter) y Node.js con TypeScript (NestJS), aplicando buenas prácticas como arquitectura MVC y metodologías ágiles (Scrum),
        además de un manejo riguroso de control de versiones con Git. Además de mi experiencia profesional construyendo plataformas de gestión académica y
        de recursos, me mantengo actualizado mediante proyectos personales donde desarrollo ecosistemas full-stack completos, incluyendo dashboards con
        autenticación JWT y visualización dinámica de datos. Soy un profesional de aprendizaje rápido, con autonomía para liderar funcionalidades y
        mantener sistemas en producción, y con una clara orientación a la mejora continua y al trabajo en equipo. Busco una posición donde pueda aportar
        valor desde el primer día y seguir creciendo técnicamente.',
    ],

    // -------------------------------------------------------------------
    // Sección de tecnologías de programación
    // -------------------------------------------------------------------
    'tech' => [
        'title'       => 'Tecnologías',
        'subtitle'    => 'Lenguajes y frameworks que utilizo',
        'languages'   => 'Lenguajes de Programación',
        'frameworks'  => 'Frameworks',
        'databases'   => 'Bases de Datos',
        'devtools'    => 'Herramientas de Desarrollo',
        'level' => [
            'advanced'     => 'Avanzado',
            'intermediate' => 'Intermedio',
            'basic'        => 'Básico',
        ],
    ],

    // -------------------------------------------------------------------
    // Sección de herramientas y software
    // -------------------------------------------------------------------
    'tools' => [
        'title'    => 'Herramientas',
        'subtitle' => 'Software y herramientas que utilizo en mi flujo de trabajo',
        'main'     => 'Herramientas Principales',
        'other'    => 'Herramientas Adicionales',
        'cloud'    => 'Nube y DevOps',
    ],

    // -------------------------------------------------------------------
    // Formación académica
    // -------------------------------------------------------------------
    'education' => [
        'title'       => 'Formación Académica',
        'subtitle'    => 'Mi trayectoria educativa',
        'degree'      => 'Ingeniero en Software',
        'institution' => 'Universidad Politécnica de Pénjamo (UPPE)',
        'period'      => 'Septiembre 2018 - Diciembre 2022',
        'license'     => 'Cédula Profesional: 14529325',
        'degree_doc'  => 'Título de Ingeniero en Software',
    ],

    // -------------------------------------------------------------------
    // Habilidades
    // -------------------------------------------------------------------
    'skills' => [
        'title'      => 'Habilidades',
        'subtitle'   => 'Competencias técnicas y blandas',
        'technical'  => 'Habilidades Técnicas',
        'soft'       => 'Habilidades Blandas',
        'soft_items' => [
            'Trabajo en equipo y liderazgo (hasta 3 personas a cargo)',
            'Planificación y organización de tareas',
            'Capacidad de aprendizaje rápido',
            'Resolución de problemas técnicos',
            'Comunicación efectiva con clientes y equipos',
            'Documentación técnica y capacitación',
        ],
    ],

    // -------------------------------------------------------------------
    // Experiencia laboral
    // -------------------------------------------------------------------
    'experience' => [
        'title'     => 'Experiencia',
        'subtitle'  => 'Mi trayectoria profesional',
        'present'   => 'Presente',
        'roles' => [
            [
                'company'  => 'Orbal Technologies',
                'role'     => 'FullStack Developer (Remoto)',
                'period'   => 'Feb 2025 - Presente',
                'summary'  => 'Desarrollo y mejora de software empresarial y plataformas web usando PHP, Laravel, JavaScript, jQuery. Metodología Scrum con Trello.',
            ],
            [
                'company'  => 'UPPE - Universidad Politécnica de Pénjamo',
                'role'     => 'Jefe de Informática y FullStack Developer',
                'period'   => 'Jun 2023 - Feb 2025',
                'summary'  => 'Diseño, desarrollo e implementación de sistemas de software institucionales. Mantenimiento preventivo y correctivo de equipos. Capacitación a usuarios.',
            ],
            [
                'company'  => 'Orbal Technologies',
                'role'     => 'FullStack Developer (Prácticas)',
                'period'   => 'Jun 2022 - Jun 2023',
                'summary'  => 'Prácticas profesionales y programa Jóvenes Construyendo el Futuro. Desarrollo de módulos en PHP, JavaScript, CSS y SQL.',
            ],
            [
                'company'  => 'GAAPEM',
                'role'     => 'Instructor',
                'period'   => 'Ago 2020 - Feb 2023',
                'summary'  => 'Enseñanza de fundamentos de computación, programación web, redes, bases de datos, C++ y C# a estudiantes de diferentes edades.',
            ],
        ],
    ],

    // -------------------------------------------------------------------
    // Página de proyectos
    // -------------------------------------------------------------------
    'projects' => [
        'title'       => 'Proyectos',
        'subtitle'    => 'Trabajo profesional y proyectos personales',
        'all'         => 'Todos',
        'web'         => 'Web',
        'mobile'      => 'Móvil',
        'backend'     => 'Backend',
        'erp'         => 'ERP',
        'personal'    => 'Personal',
        'view_demo'   => 'Ver Demo',
        'view_code'   => 'Ver Código',
        'no_url'      => 'Privado',
        'status'      => 'Estado',
        'period'      => 'Periodo',
        'company'     => 'Empresa',
        'featured'    => 'Destacado',
        'personal_project' => 'Proyecto Personal',
    ],

    // -------------------------------------------------------------------
    // Página de contacto
    // -------------------------------------------------------------------
    'contact' => [
        'title'     => 'Contacto',
        'subtitle'  => 'Información de contacto y datos personales',
        'email'     => 'Correo Electrónico',
        'phone'     => 'Teléfono',
        'cedula'    => 'Cédula Profesional',
        'location'  => 'Ubicación',
        'birthdate' => 'Fecha de Nacimiento',
        'github'    => 'GitHub',
        'linkedin'  => 'LinkedIn',
        'available' => 'Disponible para oportunidades',
    ],

    // -------------------------------------------------------------------
    // Pie de página
    // -------------------------------------------------------------------
    'footer' => [
        'rights'    => 'Todos los derechos reservados.',
        'made_with' => 'Hecho con',
        'and'       => 'y',
    ],
];
